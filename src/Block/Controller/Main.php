<?php

namespace Block\Controller;

use Application\Sys\AbstractController as Controller;
use Application\Helper\Emailer;

/**
 * Description of Main
 *
 * @author Rodrigo Manara <me@rodrigomanara.co.uk>
 */
class Main extends Controller {

    //put your code here

    public function Home() {
        
        $this->view("home.html.twig", array());
    }

    public function DetailsCV() {
        $this->view("details.cv.html.twig", array());
    }

    public function Contact() {

        $response = false;
        if ($this->getRequest()->getMethod() == "POST") {
            
            
            $body = $this->render('email.template.twig', 
                    array(
                        'first_name' => $this->getRequest()->get('first_name'),
                        'last_name' => $this->getRequest()->get('last_name'),
                        'textarea' => $this->getRequest()->get('textarea'), 
                    
                    ));
           
            $mail = new Emailer();
            $mail->setBody(array('subject'=> 'Site Contact' , 'body' => $body));
            $name = sprintf("%s %s ", $this->getRequest()->get('first_name') , $this->getRequest()->get('last_name'));
            
            $mail->setHeader($this->getRequest()->get('email'), $name);
            $response = $mail->send();
        }
        
        $this->view("contact.html.twig",
                array(
                    'form_url' => $this->getRequest()->getRequestUri() ,
                    'email_sent_response' => $response
                ));
    }
    
    public function Project() {
         $this->view("projects.html.twig", array( ));
    }

}
