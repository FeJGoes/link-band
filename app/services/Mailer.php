<?php

namespace Services;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer 
{
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();
        // $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $this->mailer->isSMTP();                                            // Send using SMTP
        $this->mailer->Host       = getenv('SMTP_HOST');                    // Set the SMTP server to send through
        $this->mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mailer->Username   = getenv('SMTP_USER');                     // SMTP username
        $this->mailer->Password   = getenv('SMTP_PASS');                               // SMTP password
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mailer->Port       = getenv('SMTP_PORT');            
    }

    /**
     * Set content
     *
     * @param string $subject
     * @param string $bodyHtml
     * @param string $bodyRaw
     * @return void
     */
    public function setContent(string $subject,string $bodyHtml,string $bodyRaw)
    {
        // Content
        $this->mailer->isHTML(true);    // Set email format to HTML
        $this->mailer->Subject = $subject;
        $this->mailer->Body    = $bodyHtml;
        $this->mailer->AltBody = $bodyRaw;
    }

    /**
     * Set sender
     *
     * @param string $email
     * @param string $name
     * @return void
     */
    public function setSender(string $email, string $name='')
    {
        //Recipients
        $this->mailer->setFrom($email, $name);
    }

    /**
     * Set receiver
     *
     * @param string $email
     * @param string $name
     * @return void
     */
    public function setReceiver(string $email, string $name='')
    {
        //Recipients
        $this->mailer->addAddress($email, $name);
    }

    public function send()
    {
        try{
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return $this->mailer->ErrorInfo;
        }
    }

}
