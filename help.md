# 目录结构
## README.md和HELP.md
- 每一个文件夹下都有一个README.md文件，介绍模块功能和使用方法
- 每一个文件夹下都有一个HELP.md文件，介绍目录树结构和文件内函数或代码块实现
## record.md  记录项目需修改或维护信息
## index.html  登录页面
## shell   shell自动运行脚本
- diary.sh    保存当天日志至指定文件夹下并发送邮件至指定邮箱
- myslq_backup.sh 备份数据库内容至指定文件夹下并删除7日前数据库备份
- crontable  linux系统cront服务定期执行任务配置文件
## first.php  平台登陆首页介绍平台各功能模块
## info.php  平台测试PHP输出PHP各加载模块页面
## phpmyadmin  MariaDB数据库可视化管理工具phpmyadmin
- phpmyadmin文件夹拷贝到http服务器目录下通过网页访问该目录(访问的式index.html)就可以登录数据库，前提是安装了PHP以及PHP的mysqlli数据库模块。
## .gitignore  git分布式版本控制系统忽略跟踪指定文件的配置文件
## sis  [SIS系统文件目录](sis/HELP.md)
- conn.php  SIS系统数据库连接文件
- top.php  重要参数展示栏
- footer.php  底部导航栏
- comm.php  公用元素库
- historySql.php SIS系统各设备操作面板二维码生成
- updateValueSql.php  SIS系统动态更新测点值的文件
- mian.php  SIS系统首页
- myScript.js  SIS系统JS函数定义
- mystyle.css  SIS系统CSS样式定义
- qishui.php  汽水系统页面
- fengyan.php  风烟系统页面
## sidebar  [侧边栏模块](sidebar/HELP.md)
- ShowQRCode.php  生成并显示当前页面二维码
- quick_index.php  快速搜索栏，不论在任何页面可以直接搜索对应记录
- news.php  开发者关于项目相关消息发布栏
- notice.php  用户信息发布栏
## header  头文件
- 目前为空文件
## lib  [项目所需库文件](lib/HELP.md)
- class  类定义文件
- footer  网站页角模块
- fpdf  php生成PDF文件的库文件和脚本
- phpqrcode  php生成二维码的库文件
- topnav  网站导航栏模块
## taizhang  [设备台账管理文件目录](taizhang/HELP.md)
## quexian  [缺陷管理文件目录](quexian/HELP.md)
## data  [设备资料管理目录](data/HELP.md)
## beipingbeijian  [物资管理目录](beipingbeijian/HELP.md)
## applet  [小程序管理目录](applet/HELP.md)
