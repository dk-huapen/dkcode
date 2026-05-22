# -*- coding:UTF-8 -*-
import Tkinter as tk
from Tkinter import *
import time, common
from typing import List
import win32timezone, datetime
import win32com.client, pythoncom
from win32com.client import gencache
import win32timezone
from win32com.client import Dispatch
from win32com.client import DispatchWithEvents
import json
import socket
#from varlist.No1Boilervar import Boilerlist
#from varlist.No3Boilervar import No3Boilerlist
#from varlist.Publicvar import Publiclist
import threading
from datetime import datetime,timedelta
import struct
import _strptime
import Queue
from varlist import No1Boilerlist,No2Boilerlist,No3Boilerlist,No4Boilerlist,Publiclist,Turbinelist
 
class groupEvent(object):
    def OnDataChange(self, TransactionID, NumItems, ClientHandles, ItemValues, Qualities, TimeStamps):
        global BoilerQueue
        buflist = {}
        i = 0
        #print("boilercallback")
        while (i < NumItems):
            handle = ClientHandles[i]
            value = ItemValues[i]
            quality = Qualities[i]
            time = TimeStamps[i]
            bjtime = datetime.strftime(datetime.strptime(str(time),"%m/%d/%y %H:%M:%S") + timedelta(hours=8),"%m/%d/%y %H:%M:%S")
            buflist[boiler_item_map[handle]] = [value,quality,bjtime]
            i = i + 1
        BoilerQueue.put(buflist)

class PublicgroupEvent(object):
    def OnDataChange(self, TransactionID, NumItems, ClientHandles, ItemValues, Qualities, TimeStamps):
        global PublicQueue
        global Publiclabel
        buflist = {}
        i = 0
        #print("publiccallback")
        while (i < NumItems):
            handle = ClientHandles[i]
            value = ItemValues[i]
            quality = Qualities[i]
            time = TimeStamps[i]
            bjtime = datetime.strftime(datetime.strptime(str(time),"%m/%d/%y %H:%M:%S") + timedelta(hours=8),"%m/%d/%y %H:%M:%S")
            buflist[Public_item_map[handle]] = [value,quality,bjtime]
            i = i + 1
        PublicQueue.put(buflist)
        
def connectOPC():
    global opcServer
    OPC_DA_DLL = gencache.EnsureModule('{28E68F91-8D75-11D1-8DC3-3C302A000000}', 0, 1, 0)
    opcServer = OPC_DA_DLL.OPCServer()
    ABBServer = 'ABB.AfwOpcDaSurrogate.1'
    try:
        opcServer.Connect(ABBServer, '127.0.0.1')
        if opcServer.ServerName == ABBServer:
            OPCStatuslabel.config(text=opcServer.ServerName)
            connectOPCButton['text'] = "连接成功"
            connectOPCButton['state'] = DISABLED
            testBoilerButton['state'] = NORMAL
            testPublicButton['state'] = NORMAL
            relaseOPCButton['state'] = NORMAL
    except:
        if opcServer:
            opsServer.Disconnect()
        OPCStatuslabel.config(text="连接失败")
        connectOPCButton['state'] = DISABLED
        connectOPCButton['text'] = "检查后再连接"
def autoStart():
    autoStartButton['state'] = DISABLED
    initOPC()
    CreatePublic()
    CreateBoiler()
    BegainPublic()
    BegainBoiler()

def initOPC():
    global opcServer
    global groups
    global Boilergroup
    global Publicgroup
    global boiler_item_map
    global Public_item_map
    varNumber = 0
    initErro = None
    totallist = len(Publiclist) + len(Boilerlist)

    try:
        groups = opcServer.OPCGroups
        groups.DefaultGroupIsActive = True
        groups.DefaultGroupDeadband = 0
        groups.DefaultGroupUpdateRate = 1000
 
        Boilergroup = DispatchWithEvents(groups.Add('Boiler'), groupEvent)
        Boilergroup.IsActive = True
        Boilergroup.IsSubscribed = True
        Boilergroup.UpdateRate = 1000
        #Boilergroup.DeadBand = 0
        Boileritems = Boilergroup.OPCItems

        for key,kks in Boilerlist.items():
            initErro = key
            #FGDdic[kks[0]] = [kks[2],kks[3]]
            item = Boileritems.AddItem(key, len(boiler_item_map))
            if item:
                item.IsActive = True
                boiler_item_map.append(kks[0])
                varNumber = varNumber + 1
            else:
                print(key)
   
        Publicgroup = DispatchWithEvents(groups.Add('Public'), PublicgroupEvent)
        Publicgroup.IsActive = True
        Publicgroup.IsSubscribed = True
        Publicgroup.UpdateRate = 1000
        #Publicgroup.DeadBand = 0
        Publicitems = Publicgroup.OPCItems

        for key,kks in Publiclist.items():
            initErro = key
            item = Publicitems.AddItem(key, len(Public_item_map))
            if item:
                item.IsActive = True
                Public_item_map.append(kks[0])
                varNumber = varNumber + 1
            else:
                print(key)
        if varNumber == totallist:
            initErro = "init ok!"
            initOPCButton['text'] = "初始化成功"+str(varNumber)+"/共"+str(totallist)+"项"
            OPCStatuslabel.config(text="初始化成功")
            initOPCButton['state'] = DISABLED
            CreatePublicButton['state'] = NORMAL
            CreateBoilerButton['state'] = NORMAL
    except:
        print("init erro")
        print(initErro)
        initOPCButton['text'] = "初始化失败"+str(varNumber)+"/共"+str(totallist)+"项"
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
        if opcServer:
            opcServer.Disconnect()
            OPCStatuslabel.config(text="已释放OPC资源")
            relaseOPCButton['state'] = DISABLED
        connectOPCButton['text'] = "初始化失败"
def testBoiler():
    global opcServer
    global testPublicFlag
    global testBoilerFlag
    boilerNum = 0

    testBoilergroups = opcServer.OPCGroups
    testBoilergroups.DefaultGroupIsActive = True
    testBoilergroups.DefaultGroupDeadband = 0
    testBoilergroups.DefaultGroupUpdateRate = 1000
 
    testBoilergroup = testBoilergroups.Add('testBoiler')
    testBoilergroup.IsActive = True
    testBoilergroup.IsSubscribed = True
    testBoilergroup.UpdateRate = 1000
    items = testBoilergroup.OPCItems

    OPCStatuslabel.config(text="正在测试锅炉数据")
    try:
        for key,kks in Boilerlist.items():
            testBoilerkey = key
            item = items.AddItem(key,boilerNum)
            if item:
                item.IsActive = True
                boilerNum = boilerNum + 1
            else:
                print(key)
        if boilerNum == len(Boilerlist):
            testBoilerkey = "Boiler test ok!"
            testBoilerButton['text'] = "测试通过"+str(boilerNum)+"/共"+str(len(Boilerlist))+"项"
            testBoilerFlag = True
            testBoilerButton['state'] = DISABLED
            if testPublicFlag:
                initOPCButton['state'] = NORMAL
                autoStartButton['state'] = NORMAL
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
            OPCStatuslabel.config(text="已删除锅炉测试组")
    except:
        print("Boiler test erro")
        print(testBoilerkey)
        testBoilerButton['text'] = "测试未通过"+str(boilerNum)+"/共"+str(len(Boilerlist))+"项"
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
        if opcServer:
            opcServer.Disconnect()
            OPCStatuslabel.config(text="已释放OPC资源")
            relaseOPCButton['state'] = DISABLED
        connectOPCButton['text'] = "测试失败"
def testPublic():
    global opcServer
    global testPublicFlag
    global testBoilerFlag
    publicNum = 0

    testPublicgroups = opcServer.OPCGroups
    testPublicgroups.DefaultGroupIsActive = True
    testPublicgroups.DefaultGroupDeadband = 0
    testPublicgroups.DefaultGroupUpdateRate = 1000
 
    testPublicgroup = testPublicgroups.Add('testPublic')
    testPublicgroup.IsActive = True
    testPublicgroup.IsSubscribed = True
    testPublicgroup.UpdateRate = 1000
    items = testPublicgroup.OPCItems

    OPCStatuslabel.config(text="正在测试公用数据")
    try:
        for key,kks in Publiclist.items():
            testPublickey = key
            item = items.AddItem(key,publicNum)
            if item:
                item.IsActive = True
                publicNum = publicNum + 1
            else:
                print(key)
        if publicNum == len(Publiclist):
            testPublickey = "Public test ok!"
            testPublicButton['text'] = "测试通过"+str(publicNum)+"项/共"+str(len(Publiclist))+"项"
            testPublicFlag = True
            testPublicButton['state'] = DISABLED
            if testBoilerFlag:
                initOPCButton['state'] = NORMAL
                autoStartButton['state'] = NORMAL
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
            OPCStatuslabel.config(text="已删除公用测试组")
    except:
        print("Public test erro")
        print(testPublickey)
        testPublicButton['text'] = "测试未通过"+str(publicNum)+"项/共"+str(len(Publiclist))+"项"
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
        if opcServer:
            opcServer.Disconnect()
            OPCStatuslabel.config(text="已释放OPC资源")
            relaseOPCButton['state'] = DISABLED
        connectOPCButton['text'] = "测试失败"


def CreatePublic():
    t = threading.Thread(target=SendPublicData,name='senddata',args=(2,))
    t.daemon = True
    t.start()
    CreatePublicButton['state'] = DISABLED
    BegainPublicButton['state'] = NORMAL


def CreateBoiler():
    #BoilerEvent.set()
    t = threading.Thread(target=SendBoilerData,name='senddata',args=(2,))
    t.daemon = True
    t.start()
    CreateBoilerButton['state'] = DISABLED
    BegainBoilerButton['state'] = NORMAL

def BegainBoiler():
    BoilerEvent.set()
    BegainBoilerButton['state'] = DISABLED
    StopBoilerButton['state'] = NORMAL

def StopBoiler():
    BoilerEvent.clear()
    StopBoilerButton['state'] = DISABLED
    BegainBoilerButton['state'] = NORMAL

def BegainPublic():
    PublicEvent.set()
    BegainPublicButton['state'] = DISABLED
    StopPublicButton['state'] = NORMAL
def StopPublic():
    PublicEvent.clear()
    StopPublicButton['state'] = DISABLED
    BegainPublicButton['state'] = NORMAL

def quit_app(even=None):
    global ThreadFlag
    global opcServer
    try:
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
            print("remove groups")
        #opcServer.Disconnect()
        #OPCStatuslabel = tk.Label(root,text="已释放OPC资源")
        ThreadFlag = False
    finally:
        if opcServer:
            opcServer.Disconnect()
            print("relase OPC")
            OPCStatuslabel.config(text="已释放OPC资源")
            connectOPCButton['text'] = "连接OPC服务器"
            connectOPCButton['state'] = NORMAL
            testBoilerButton['state'] = DISABLED
            testPublicButton['state'] = DISABLED
            relaseOPCButton['state'] = DISABLED
            initOPCButton['state'] = DISABLED
def SendBoilerData(n):
    global BoilerQueue
    global ThreadFlag
    s = socket.socket()
    #IP
    host = '192.168.1.101'
    #port
    port = 8899
    #connect
    s.connect((host,port))
    try:
        send_values = {}
        #while True:
        while ThreadFlag:
            if not BoilerEvent.is_set():
                BoilerStatuslabel.config(text="锅炉暂停发送数据")
            BoilerEvent.wait()
            send_values.clear()
            send_values = BoilerQueue.get()
            #BoilerStatuslabel.config(text="锅炉发送队列:"+str(BoilerQueue.qsize()))
            #print(send_values)
            #print(BoilerQueue.qsize())
            data = json.dumps(send_values)
            #BoilerStatuslabel.config(text="队列大小:"+str(BoilerQueue.qsize())+"/数据大小"+str(len(data)))
            BoilerStatuslabel.config(text="/数据大小"+str(len(data)))
            #print(data)
            length = len(data)
            s.sendall(struct.pack('>i',length) + data)
            time.sleep(0.2)
    finally:
        print("last")
        s.close()
        BoilerEvent.clear()
        StopBoilerButton['state'] = DISABLED
        BegainBoilerButton['state'] = NORMAL
        BoilerStatuslabel.config(text="锅炉线程正常结束")

def SendPublicData(n):
    
    global PublicQueue
    s = socket.socket()
    #IP
    host = '192.168.1.101'
    #port
    port = 2181
    #connect
    s.connect((host,port))
    try:
        send_values = {}
        while True:
            if not PublicEvent.is_set():
                PublicStatuslabel.config(text="公用暂停发送数据")
            PublicEvent.wait()
            send_values.clear()
            send_values = PublicQueue.get()
            #print(send_values)
            #print(PublicQueue.qsize())
            #Publiclabel.config(text=PublicQueue.qsize())
            
            data = json.dumps(send_values)
            PublicStatuslabel.config(text="队列大小:"+str(PublicQueue.qsize())+"/数据大小"+str(len(data)))
            #print(data)
            length = len(data)
            s.sendall(struct.pack('>i',length) + data)
            time.sleep(0.2)
    finally:
        print("last")
        s.close()
        PublicEvent.clear()
        StopPublicButton['state'] = DISABLED
        BegainPublicButton['state'] = NORMAL
        PublicStatuslabel.config(text="公用线程正常结束")
OPC_DA_DLL = gencache.EnsureModule('{28E68F91-8D75-11D1-8DC3-3C302A000000}', 0, 1, 0)
opcServer = OPC_DA_DLL.OPCServer()
#opcServer.Connect('PCAuto.OPCServer', "192.168.1.119")
BoilerEvent = threading.Event()
PublicEvent = threading.Event()
ThreadFlag = True
opcServer = None
errokey = ''
groups = None
testBoilerFlag = False
testPublicFlag = False
Boilergroup = None
Publicgroup = None
Boilerlist= {}
Boilerlist.update(No1Boilerlist)
Boilerlist.update(No2Boilerlist)
Boilerlist.update(No3Boilerlist)
Publiclist.update(Turbinelist)
try:
    BoilerQueue = Queue.Queue()
    PublicQueue = Queue.Queue()
    

    boiler_item_map = []
    boiler_item_map.append("ABB")

    Public_item_map = []
    Public_item_map.append("ABBPublic")

    
    root = tk.Tk()

    root.title("ABB OPC采集发送软件")
    root.geometry("900x500")
    testBoilerButton = tk.Button(root,text="测试锅炉OPC项",width=20,state=DISABLED,command=testBoiler)
    testBoilerButton.place(x=5,y=50)
    CreateBoilerButton = tk.Button(root,text="创建锅炉线程",width=20,state=DISABLED,command=CreateBoiler)
    CreateBoilerButton.place(x=170,y=50)
    BegainBoilerButton = tk.Button(root,text="开始发送数据",state=DISABLED,width=20,command=BegainBoiler)
    BegainBoilerButton.place(x=340,y=50)
    StopBoilerButton = tk.Button(root,text="停止发送数据",width=20,state=DISABLED,command=StopBoiler)
    StopBoilerButton.place(x=520,y=50)
    BoilerStatuslabel = tk.Label(root,text="未创建锅炉线程")
    BoilerStatuslabel.place(x=670,y=50)

    testPublicButton = tk.Button(root,text="测试公用OPC项",width=20,state=DISABLED,command=testPublic)
    testPublicButton.place(x=5,y=100)
    CreatePublicButton = tk.Button(root,text="创建公用线程",width=20,state=DISABLED,command=CreatePublic)
    CreatePublicButton.place(x=170,y=100)
    BegainPublicButton = tk.Button(root,text="开始发送数据",width=20,state=DISABLED,command=BegainPublic)
    BegainPublicButton.place(x=340,y=100)
    StopPublicButton = tk.Button(root,text="停止发送数据",width=20,state=DISABLED,command=StopPublic)
    StopPublicButton.place(x=520,y=100)
    PublicStatuslabel = tk.Label(root,text="未创建公用线程")
    PublicStatuslabel.place(x=670,y=100)
    
    connectOPCButton = tk.Button(root,text="连接OPC DA服务器",width=20,command=connectOPC)
    connectOPCButton.place(x=5,y=5)

    initOPCButton = tk.Button(root,text="初始化OPC数据",width=20,state=DISABLED,command=initOPC)
    initOPCButton.place(x=170,y=5)
    autoStartButton = tk.Button(root,text="自动启动",width=20,state=DISABLED,command=autoStart)
    autoStartButton.place(x=340,y=5)

    #OPCStatuslabel = tk.Label(root,text=opcServer.ServerName)
    OPCStatuslabel = tk.Label(root,text="OPC服务器状态")
    OPCStatuslabel.place(x=670,y=5)
    relaseOPCButton = tk.Button(root,text="释放OPC资源",width=20,state=DISABLED,command=quit_app)
    relaseOPCButton.place(x=520,y=5)
    
    root.bind('<q>',quit_app)
    root.mainloop()
except:
    print("erro")
    opcServer.OPCGroups.RemoveAll()
    opcServer.Disconnect()
    print("relase erro OPC")
