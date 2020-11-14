<?php

interface MailerConnect
{
    public function setHost(string $host): void;
    public function setUser(string $user): void;
    public function setPassword(string $password): void;
    public function connection (): string;
}

class Mailer
{
    private $mailer;
    private array $mail;

    public function setMailer (MailerConnect $mailer )
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

class GoogleMailer implements MailerConnect
{
    private array $settings;

    public function __construct($settings = null)
    {
        if ($settings) {
            $this->settings['host'] = $settings['host'];
            $this->settings['user'] = $settings['user'];
            $this->settings['password'] = $settings['password'];
        } else {
            throw new Exception('Not found config data');
        }
    }

    public function connection (): string
    {
        return 'Successful';
    }
    
    public function setHost(string $host): void
    {
        $this->settings['host'] = $host;
    }

    public function setUser(string $user): void
    {
        $this->settings['user'] = $user;
    }

    public function setPassword(string $password): void
    {
        $this->settings['password'] = $password;
    }
}

try {
    $googleMailer = new GoogleMailer(['host' => 'smtp.google.com', 'user' => 'test', 'password' => 'testpass']);
    $mailer = new Mailer();
    $mailer->setMailer($googleMailer);
    $mailer->compose('test@mail.com', 'student@mail.com', 'Welcome', 'Welcome message');
    echo $mailer->send();
} catch (Exception $exception){
    echo $exception->getMessage();
}
