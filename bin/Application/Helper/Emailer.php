<?php

 

namespace Beagle\Application\Helper;

use PHPMailer;

/**
 * Description of Emailer
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Emailer {

    protected $mail;

    public function __construct() {

        $this->mail = new PHPMailer;

        $this->connect();

        $this->mail->isHTML(true);                                  // Set email format to HTML
    }

    private function connect() {

        $this->mail->isSendmail();                                      // Set mailer to use SMTP
        $this->mail->Host = 'auth.smtp.1and1.co.uk';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = __emailFrom;                 // SMTP username
        $this->mail->Password = pwd_email;                           // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;
    }

    /**
     * 
     * @param type $from
     * @param type $name
     */
    public function setHeader($from, $name) {

        $this->mail->setFrom(__emailFrom, __name);
        $this->mail->addAddress($from, $name);     // Add a recipient
        $this->mail->addReplyTo(__email, __name);
        $this->mail->addBCC(__email, __name);
    }

    /**
     * array(
     * 'subject' => '',
     * 'body' => '',
     * )
     * @param array $data
     */
    public function setBody(array $data) {

        if (!array_key_exists('subject', $data)) {
            throw new Exception('missing required fields');
        } elseif (!array_key_exists('body', $data)) {
            throw new Exception('missing required fields');
        }

        $this->mail->Subject = $data['subject'];
        $this->mail->Body = $data['body'];
    }

    /**
     * 
     * @return string
     */
    public function send() {
        $response = array();
        if (!$this->mail->send()) {
            $response[] = 'Message could not be sent.';
            $response[] = 'Mailer Error: ' . $this->mail->ErrorInfo;
        } else {
            $response[] = 'Message has been sent';
        }
        return $response;
    }

}
