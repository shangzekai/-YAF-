# Yaf框架
Yaf 地址:https://github.com/laruence/php-yaf 请针对自己的php 版本进行安装
鸟哥的官方文档及源码.(http://www.laruence.com/manual/)

## 一个简单的后台管理页面，分别实现下面内容
- layout布局实现
- bootstrap 后台管理界面
- PDO数据库操作类(Mysql数据主从实现)
- 简单的增删改查实现
- 错误捕捉显示及日志记录
- 实现dataTables支持，不需要分页类的支持

## 依赖
- Nginx
- PHP 5.5 +
- YAF扩展包 (http://www.pecl-php.net)
- Mysql 5.5 +

## 怎么部署

### Rewrite rules

#### Apache

```conf
#.htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule .* index.php
```

#### Nginx (nginx.conf已有示例)

```
server {
  listen ****;
  server_name  domain.com;
  root   document_root;
  index  index.php index.html index.htm;
 
  location / {
		try_files $uri $uri/ /index.php?$args;
  }

}
```
### 数据库
使用database.sql,简单的例子，只有一个数据表(增删改查实现)

### 错误配置
报错开启关闭在ini中有配置，可以记录为日志文件，需要有写权限。在Error.php实现。
