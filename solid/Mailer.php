<?php

//Hint - Dependency Inversion Principle

interface MailerConnection
{
    public function connect();
}

class Mailer implements MailerConnection
{
    private $option;
    /**
     * Mailer constructor.
     * @param array $setting
     */
    public function __construct(array $setting)
    {
        $this->option['host'] = $setting['host'];
        $this->option['name'] = $setting['name'];
    }

    public function connect()
    {
        return 'Connect approved';
    }
}

class SendWelcomeMessage
{
    private $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

//SendWelcomeGoolge
//SendWelcomeSendgrid
//SendWelcomeMailchimp
