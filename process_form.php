<?php
// 设置邮件接收者
$to = "javier911@163.com";

// 获取表单数据
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$registration_date = date('Y-m-d H:i:s');

// 设置邮件主题
$subject = "[测试] 新的TukTuk注册信息";

// 构建邮件内容
$message = "收到新的注册信息：\n\n";
$message .= "姓名: " . $name . "\n";
$message .= "电话: " . $phone . "\n";
$message .= "邮箱: " . $email . "\n";
$message .= "注册时间: " . $registration_date . "\n";
$message .= "\n--- 这是一封测试邮件 ---\n";

// 设置邮件头
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// 发送邮件
if(mail($to, $subject, $message, $headers)) {
    echo json_encode(["success" => true, "message" => "注册成功！"]);
} else {
    echo json_encode(["success" => false, "message" => "注册失败，请稍后重试。"]);
}
?> 