# -*- coding: UTF-8 -*-
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
from FGDvar import FGDlist
import threading
from datetime import datetime,timedelta
import struct
import _strptime
import Queue
import pytime
 
class groupEvent(object):
    def OnDataChange(self, TransactionID, NumItems, ClientHandles, ItemValues, Qualities, TimeStamps):
        global qList
        buflist = {}
        i = 0
        #print("callback")
        #FGDCallback = FGDCallback ^ True
        #OPCStatusLabel.config(text=str(FGDCallback))
        while (i < NumItems):
            handle = ClientHandles[i]
            value = ItemValues[i]
            quality = Qualities[i]
            time = TimeStamps[i]
            bjtime = datetime.strftime(datetime.strptime(str(time),"%m/%d/%y %H:%M:%S") + timedelta(hours=8),"%m/%d/%y %H:%M:%S")
            buflist[item_name_map[handle]] = [value,quality,bjtime]
            i = i + 1
        qList.put(buflist)

def connectOPC():
    global opcServer
    OPC_DA_DLL = gencache.EnsureModule('{28E68F91-8D75-11D1-8DC3-3C302A000000}', 0, 1, 0)
    opcServer = OPC_DA_DLL.OPCServer()
    ABBServer = 'ABB.AfwOpcDaSurrogate.1'
    try:
        opcServer.Connect(ABBServer, '172.16.52.3')
        if opcServer.ServerName == ABBServer:
            OPCStatusLabel.config(text=opcServer.ServerName)
            connectOPCButton['text'] = "连接成功"
            connectOPCButton['state'] = DISABLED
            testVarButton['state'] = NORMAL
            relaseOPCButton['state'] = NORMAL 
    except:
        if opcServer:
            opcServer.Disconnect()
        OPCStatusLabel.config(text="连接失败")
        connectOPCButton['state'] = DISABLED
        connectOPCButton['text'] = "检查后再连接"

def quit_app(even=None):
    try:
        global opcServer

        #s.close()
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
            print("remove groups")
    finally:
        if opcServer:
            opcServer.Disconnect()
            print("relase OPC")
            OPCStatusLabel.config(text="OPC资源已释放")
            relaseOPCButton['state'] = DISABLED
            connectOPCButton['text'] = "连接OPC服务器"
            connectOPCButton['state'] = NORMAL
            testVarButton['state'] = DISABLED
            CreateFGDButton['state'] = DISABLED
            autoStartButton['state'] = DISABLED

def autoStart():
    autoStartButton['state'] = DISABLED
    #initOPCButton['state'] = DISABLED
    initOPC()
    CreateFGD()
    BegainFGD()
def testVar():
    global opcServer
    testErro = ""
    testNumber = 0


    testgroups = opcServer.OPCGroups
    testgroups.DefaultGroupIsActive = True
    testgroups.DefaultGroupDeadband = 0
    testgroups.DefaultGroupUpdateRate = 200
 
    testgroup = testgroups.Add('test')
    testgroup.IsActive = True
    testgroup.IsSubscribed = True
    testgroup.UpdateRate = 1000
    items = testgroup.OPCItems

    try:
        for key,kks in FGDlist.items():
            testErro=key
            #item = items.AddItem(key, len(item_name_map))
            item = items.AddItem(key, testNumber)
            if item:
                item.IsActive = True
                testNumber = testNumber + 1
            else:
                print(key)
        if testNumber == len(FGDlist):
            testErro = "varlist test ok!"
            testVarButton['text'] = "测试通过"+str(testNumber)+"/共"+str(len(FGDlist))+"项"
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
            OPCStatusLabel.config(text="已删除测试组")
            initOPCButton['state'] = NORMAL
            autoStartButton['state'] = NORMAL
    except:
        print("erro:")
        print(testErro)
        testVarButton['text'] = "测试未通过"+str(testNumber)+"/共"+str(len(FGDlist))+"项"
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
        if opcServer:
            opcServer.Disconnect()
        OPCStatusLabel.config(text="已释放OPC资源")
        testVarButton['state'] = DISABLED
        relaseOPCButton['state'] = DISABLED
        connectOPCButton['text'] = "测试失败"

def initOPC():
    global item_name_map
    global opcServer
    global varNumber
    global initErro
    global group
    global groups

    groups = opcServer.OPCGroups
    groups.DefaultGroupIsActive = True
    groups.DefaultGroupDeadband = 0
    groups.DefaultGroupUpdateRate = 200
 
    group = DispatchWithEvents(groups.Add(''), groupEvent)
    group.IsActive = True
    group.IsSubscribed = True
    group.UpdateRate = 1000
    #group.Deadband = 0.5
    items = group.OPCItems

    try:
        for key,kks in FGDlist.items():
            varErro=key
            item = items.AddItem(key, len(item_name_map))
            if item:
                item.IsActive = True
                item_name_map.append(kks[0])
                varNumber = varNumber + 1
            else:
                print(key)
        if varNumber == len(FGDlist):
            initErro = "varlist test ok!"
            initOPCButton['text'] = "初始化成功"+str(varNumber)+"/共"+str(len(FGDlist))+"项"
            initOPCButton['state'] = DISABLED
            OPCStatusLabel.config(text="初始化成功")
            testVarButton['state'] = DISABLED
            relaseOPCButton['state'] = NORMAL
            CreateFGDButton['state'] = NORMAL
    except:
        print("erro:")
        print(initErro)
        initOPCButton['text'] = "初始化失败"+str(testNumber)+"/共"+str(len(FGDlist))+"项"
        if opcServer.OPCGroups:
            opcServer.OPCGroups.RemoveAll()
        if opcServer:
            opcServer.Disconnect()
        OPCStatusLabel.config(text="已释放OPC资源")
        testVarButton['state'] = DISABLED
        relaseOPCButton['state'] = DISABLED
    finally:
        print("init ok")

def CreateFGD():
    t = threading.Thread(target=senddata,name='senddata',args=(2,))
    t.daemon = True
    t.start()
    CreateFGDButton['state'] = DISABLED
    BegainFGDButton['state'] = NORMAL

def BegainFGD():
    FGDEvent.set()
    BegainFGDButton['state'] = DISABLED
    StopFGDButton['state'] = NORMAL

def StopFGD():
    FGDEvent.clear()
    StopFGDButton['state'] = DISABLED
    BegainFGDButton['state'] = NORMAL

def senddata(n):
    global qList
    s = socket.socket()
    #IP
    host = '192.168.2.101'
    #port
    port = 9090
    #connect
    s.connect((host,port))
    try:
        send_values = {}
        while True:
            if not FGDEvent.is_set():
                FGDStatusLabel.config(text="脱硫暂停发送")
            FGDEvent.wait()
            send_values.clear()
            send_values = qList.get()
            #FGDStatusLabel.config(text="脱硫发送队列:"+str(qList.qsize()))
            #print(send_values)
            #print(qList.qsize())
            data = json.dumps(send_values)
            FGDStatusLabel.config(text="队列大小:"+str(qList.qsize())+"/数据大小"+str(len(data)))
            #print(data)
            length = len(data)
            s.sendall(struct.pack('>i',length) + data)
            time.sleep(0.2)
    finally:
        print("last")
        s.close()
        FGDEvent.clear()
        StopFGDButton['state'] = DISABLED
        BegainFGDButton['state'] = NORMAL
        FGDStatusLabel.config(text="脱硫线程正常结束")

 
try:
    FGDCallback = False
    opcServer = None
    groups = None
    group = None
    qList = Queue.Queue()
    initErro = ''
    varNumber = 0
    FGDEvent = threading.Event()

    item_name_map = []
    item_name_map.append(["ABB"])
   
    root = tk.Tk()
    root.title("脱硫OPC采集发送软件")
    root.geometry("900x500")

    connectOPCButton = tk.Button(root,text="连接OPC服务器",width=20,command=connectOPC)
    connectOPCButton.place(x=5,y=5)
    initOPCButton = tk.Button(root,text="初始化OPC数据",width=20,state=DISABLED,command=initOPC)
    initOPCButton.place(x=170,y=5)
    autoStartButton = tk.Button(root,text="自动启动",width=20,state=DISABLED,command=autoStart)
    autoStartButton.place(x=340,y=5)
    relaseOPCButton = tk.Button(root,text="释放OPC资源",width=20,state=DISABLED,command=quit_app)
    relaseOPCButton.place(x=520,y=5)
    OPCStatusLabel = tk.Label(root,text="OPC服务器状态",width=20)
    OPCStatusLabel.place(x=670,y=5)

    testVarButton = tk.Button(root,text="测试OPC数据",state=DISABLED,width=20,command=testVar)
    testVarButton.place(x=5,y=50)
    CreateFGDButton = tk.Button(root,text="创建脱硫线程",state=DISABLED,width=20,command=CreateFGD)
    CreateFGDButton.place(x=170,y=50)
    BegainFGDButton = tk.Button(root,text="开始发送数据",state=DISABLED,width=20,command=BegainFGD)
    BegainFGDButton.place(x=340,y=50)
    StopFGDButton = tk.Button(root,text="停止发送数据",width=20,state=DISABLED,command=StopFGD)
    StopFGDButton.place(x=520,y=50)
    FGDStatusLabel = tk.Label(root,text="未创建脱硫线程",width=20)
    FGDStatusLabel.place(x=670,y=50)

    #OPCStatusLabel = tk.Label(root,text=opcServer.ServerName,width=20)
    #OPCStatusLabel.place(x=5,y=5)
    #OPCRelaseButton = tk.Button(root,text="释放OPC资源",width=20,command=quit_app)
    #OPCRelaseButton.place(x=340,y=5)

    root.bind('<q>',quit_app)
    root.mainloop()
except:
    print("erro")
    opcServer.OPCGroups.RemoveAll()
    opcServer.Disconnect()
    print("relase erro OPC")
