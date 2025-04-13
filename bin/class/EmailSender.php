<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';

class EmailSender {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->configureSMTP();
    }

    private function configureSMTP(): void
    {
        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.titan.email';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'info@mmofishing.games';
            $this->mail->Password = ':O;5fWugeoX2opF'; // Store securely!
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
        } catch (Exception $e) {
            echo "Mailer Error: " . $e->getMessage();
        }
    }

    public function sendVerifyEmail($email, $hashed_token): true|string
    {
        try {
            $this->mail->setFrom('info@mmofishing.games', 'MMO Fishing Games');
            $this->mail->addAddress($email);

            // Subject
            $this->mail->Subject = "MMO Fishing Games - Account Validation";

            // Compose message
            $body = file_get_contents('./../email/verifyEmail.html');

            // Replace vars in email
            $url_verify = 'https://mmofishing.games/login/?t=' . $hashed_token;
            $body = str_replace('{{URL_VERIFY}}', $url_verify, $body);

            $this->mail->MsgHTML($body);

            if (!$this->mail->send()) {
                return "Mailer Error: " . $this->mail->ErrorInfo;
            }
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

}

// Usage Example
// $emailSender = new EmailSender();
// echo $emailSender->sendEmail('recipient@example.com', 'hashed_token_here');

?>
