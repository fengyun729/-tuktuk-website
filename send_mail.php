<?php
// 开启错误报告
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 检查是否已安装 PHPMailer
if (!file_exists('vendor/autoload.php')) {
    die('PHPMailer not found. Please run: composer install');
}

require 'vendor/autoload.php';

// 获取表单数据
$name = $_POST['name'] ?? '未提供';
$phone = $_POST['phone'] ?? '未提供';
$email = $_POST['email'] ?? '未提供';
$registration_date = date('Y-m-d H:i:s');

// 创建新的 PHPMailer 实例
$mail = new PHPMailer(true);

try {
    // 服务器设置
    $mail->SMTPDebug = 2; // 启用详细的调试输出
    $mail->isSMTP();
    $mail->Host = 'smtp.163.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'javier911@163.com';
    $mail->Password = 'DKtiWDuhxWqaQxz3';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';

    // 发件人和收件人
    $mail->setFrom('javier911@163.com', 'TukTuk Registration');
    $mail->addAddress('javier911@163.com');

    // 邮件内容
    $mail->isHTML(true);
    $mail->Subject = '[测试] 新的TukTuk注册信息';
    $mail->Body = "
        <h2>收到新的注册信息：</h2>
        <p><strong>姓名:</strong> {$name}</p>
        <p><strong>电话:</strong> {$phone}</p>
        <p><strong>邮箱:</strong> {$email}</p>
        <p><strong>注册时间:</strong> {$registration_date}</p>
        <p><em>--- 这是一封测试邮件 ---</em></p>
    ";

    $mail->send();
    echo json_encode(["success" => true, "message" => "注册成功！"]);
} catch (Exception $e) {
    $error_message = "注册失败: " . $mail->ErrorInfo . "\n";
    $error_message .= "错误详情: " . $e->getMessage() . "\n";
    $error_message .= "错误文件: " . $e->getFile() . "\n";
    $error_message .= "错误行号: " . $e->getLine();
    
    error_log($error_message);
    echo json_encode(["success" => false, "message" => $error_message]);
}
?> 