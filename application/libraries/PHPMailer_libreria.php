<?php
class PHPMailer_libreria
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        //require_once(APPPATH."third_party/phpmailer/src/Exception.php");
        require_once(APPPATH."third_party/phpmailer/src/PHPMailer.php");
        require_once(APPPATH."third_party/phpmailer/src/SMTP.php");
        $objMail = new PHPMailer;
        return $objMail;
    }
}