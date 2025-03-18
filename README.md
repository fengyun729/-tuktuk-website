# TukTuk 网站

这是一个展示 TukTuk 产品的网站，支持英文和斯瓦西里语切换。

## 运行要求

- PHP 7.4 或更高版本
- Composer
- Web 服务器（Apache/Nginx）

## 安装步骤

1. 安装 Composer（如果尚未安装）
   - 访问 https://getcomposer.org/download/ 下载并安装 Composer

2. 安装依赖
   ```bash
   composer install
   ```

3. 配置邮件发送
   - 打开 `send_mail.php`
   - 修改以下配置：
     ```php
     $mail->Username = 'javier911@163.com';  // 您的邮箱
     $mail->Password = 'DKtiWDuhxWqaQxz3';  // 您的邮箱授权码
     ```

4. 启动 Web 服务器
   - 如果使用 PHP 内置服务器：
     ```bash
     php -S localhost:8000
     ```
   - 或者将文件放在 Apache/Nginx 的网站目录下

5. 访问网站
   - 打开浏览器
   - 访问 http://localhost:8000

## 文件结构

```
├── index.html          # 主页面
├── process_form.php    # 处理表单提交
├── send_mail.php       # 发送邮件
├── composer.json       # 依赖配置
├── README.md          # 说明文件
└── images/            # 图片资源
    ├── hero-bg.jpg
    ├── features/
    └── products/
```

## 注意事项

- 确保服务器支持 PHP 和邮件发送功能
- 确保 163 邮箱已开启 SMTP 服务
- 如果使用本地服务器，可能需要配置 SSL 证书才能正常发送邮件

## 联系方式

如有问题，请联系网站管理员。 