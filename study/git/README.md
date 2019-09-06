<!--
 * @Author: zhangjingguo
 * @Date: 2019-09-06 14:21:47
 * @LastEditTime: 2019-09-06 16:07:36
 * @Description: file content
 -->
#   git远程仓库的创建与使用

##  远程服务端:安装git 
### 查看git配置信息 config --list
### 查看git用户名  git config user.name
### 全局配置用户名 git config --global user.name xxx
### 全局配置邮箱   git config --global user.email "eamil@xx.com"

##  远程服务端:在一个文件夹下(记住路径),使用git init 建立仓库(--bare init //此命令就是创建了无工作区的仓库)
### vim test.txt //创建文件编写信息后保存(vm :wq 保存并退出)
### git add test.txt
### git commit -m "第一次提交"

##  SSH:
### 客户端推送代码到服务端需要用ssh密钥
### ssh-keygen -t rsa -C "邮箱地址"
### 执行上述命令后，生成.ssh目录，进入此目录就会看到有两个文件，id_rsa和id_rsa.pub，其中id_rsa.pub是公钥
### 将客户端的公钥上传到服务端，在服务端进入.ssh目录，创建authorized_keys文件，将刚刚客户端生成的id_rsa.pub公钥内容保存到此文件中

##  本地端:
### git init 一个仓库 或者直接git clone远程仓库
### git add test.txt
### git commit -m "第一次提交"
### git remote add origin 用户名@ IP地址 :/home/用户名/XXX.git  //说明：此处git@xxx里边的git就是git用户
### git push origin master  //推送
#### git push错误 remote: error: refusing to update checked out branch: refs/heads/master 解决方式
### 这是由于git默认拒绝了push操作，需要进行设置，修改.git/config文件后面添加如下代码：
    `[receive]
     denyCurrentBranch = ignore`
### 重新git push即可

##  远程服务端:
### 拿出版本库的代码 git 恢复文件到初始状态的命令：
### git reset HEAD <file>
### git checkout <file> (.代表全部)
#### 解释: git reset HEAD 的意思就是将HEAD区里HEAD版本给恢复到暂存区，接着git checkout 就可以把暂存区的拉下来
