<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer Composer ile kurulduysa

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "rasihozturk000@gmail.com"; 
    $from  = $_POST['email']; 
    $sender_name = $_POST['name'];
    $adress = $_POST['adress'];
    $service = $_POST['Subject'];
    $note = $_POST['note'];

    $subject = "Form submission";

    $message = "$sender_name has sent a contact message.\n";
    $message .= "Service: $service\n";
    $message .= "Address: $adress\n";
    $message .= "Message: \n$note";

    $mail = new PHPMailer(true);

    try {
        // Sunucu Ayarları
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';          // SMTP sunucun (örnek: smtp.gmail.com)
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kendiadresin@example.com';  // SMTP kullanıcı adı
        $mail->Password   = 'parolan';                   // SMTP şifresi (Gmail için uygulama şifresi gerekebilir)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Gönderen ve Alıcı
        $mail->setFrom($from, $sender_name);
        $mail->addAddress($to);

        // İçerik
        $mail->isHTML(false); // Düz metin
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "Mesaj başarıyla gönderildi.";
    } catch (Exception $e) {
        echo "Mesaj gönderilemedi. Hata: {$mail->ErrorInfo}";
    }
}
?>
