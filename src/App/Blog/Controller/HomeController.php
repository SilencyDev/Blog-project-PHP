<?php

namespace API\App\Blog\Controller;

use API\Lib\Blog\Controller\Controller;
use API\Lib\Blog\Config\Configuration;
use API\App\Blog\Manager\ImageManager;

class HomeController extends Controller {

    public function __construct() {
        $this->imageManager = new ImageManager();
    }

    Public function index() {
        $this->createView();
    }

    public function sendMail() {

        $firstName = $this->request->getParams('firstName');
        $lastName = $this->request->getParams('lastName');
        $email = $this->request->getParams('email');
        $content = $this->request->getParams('content');
        $content = 'full name: '.$firstName.' '.$lastName.'
        Email: '.$email.'
        Message: '.$content;

        $mailUsername = Configuration::get('mailUsername');
        $mailPassword = Configuration::get('mailPassword');
        $mailSender = Configuration::get('mailSender');
        $mailReceiver = Configuration::get('mailReceiver');

        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername($mailUsername)
        ->setPassword($mailPassword);

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Message from personnal website'))
        ->setFrom([$mailUsername => $mailSender])
        ->setTo([$mailReceiver])
        ->setBody($content);

        // Send the message
        $result = $mailer->send($message);

        $this->redirect('home');
    }
}