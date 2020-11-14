<?php

class Mailer
{

    private $mailer;
    private $mail;

    public function setMailer (GoogleMailer $mailer )
    {
        $this->mailer = $mailer;
    }

    public function compose ($to, $from, $body, $subject)
    {
    $this->mail = [
        'to' => $to,
        'from' => $from,
        'body' => $body,
        'subject' => $subject
    ];
    }

    public function send()
    {
        if (!empty($this->mail)) {
            return sprintf('Mail was sent to %s from %s with subject %s and message %s', $this->mail['to'], $this->mail['from'], $this->mail['subject'], $this->mail['body']);
        } else {
            throw new Exception('Mail was not composed');
        }
    }
}

class GoogleMailer
{
    private $settings = [];

    public function __construct($settings = null)
    {
        if ($settings) {
            $this->settings['host'] = $settings['host'];
            $this->settings['user'] = $settings['user'];
            $this->settings['password'] = $settings['password'];
        }
    }
    public function setHost(string $host)
    {
        $this->settings['host'] = $host;
    }

    public function setUser(string $user) {
        $this->settings['user'] = $user;
    }

    public function setPassword(string $password)
    {
        $this->settings['password'] = $password;
    }
}

$googleMailer = new GoogleMailer(['host' => 'smtp.google.com', 'user' => 'test', 'password' => 'testpass']);
$mailer = new Mailer();
$mailer->setMailer($googleMailer);
$mailer->compose('test@mail.com', 'student@mail.com', 'Welcome', 'Welcome message');
try {
    echo $mailer->send();
} catch (Exception $exception){
    echo $exception->getMessage();
}



