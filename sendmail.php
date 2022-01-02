<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';

   $mail = new PHPMailer(true);
   $mail->CharSet = 'UTF-8';
   $mail->setLanguage('ru', 'phpmailer/language/');
   $mail->IsHTML(true);

   //от кого письмо
   $mail->setForm('logissnab@mail.ru', 'Aibek');
   //кому отпправить
   $mail->addAddress('jcconsulting@bk.ru');
   //тема писма
   $mail->Subject = 'Привет!';



   //Тело письма

   $body = '<h1>Письмо</h1>';

   if(trim(!empty($_POST['name']))){
      $body.='<p><strong>Имя:</strong> '.$_POST['name'].'<p>';
   }
   if(trim(!empty($_POST['phone']))){
      $body.='<p><strong> Телефон: </strong> '.$_POST['phone'].'<p>';
   }

   $mail->Body = $body;

   //Отправляем

if(!$mail->send()){
   $message = 'ошибка от php';
} 
else {
   $message = 'Данные отправлены';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

?>