<?php

interface ConfigurationInterface
{
    public function setConnection($settings): void;
    public function getConfig(): string;
    public function configure(): ConfigurationInterface;
}

trait ConnectionTrait
{
    private $settings;
    private $configuration;

    public function setConnection($settings): void
    {
        $this->settings = $settings;
    }

    public function getConfig(): string
    {
        return 'some Config';
    }

}

class MailConfigurator implements ConfigurationInterface
{
    use ConnectionTrait;

    public function configure() :ConfigurationInterface
    {
        $this->configuration = $this->settings['mailer_options'];
        return $this;
    }
}

class DatabaseConfigurator implements ConfigurationInterface
{
    use ConnectionTrait;

    public function configure(): ConfigurationInterface
    {
        $this->configuration['dsn'] = $this->settings['dsn'];
        $this->configuration['user'] = $this->settings['user'];
        $this->configuration['password'] = $this->settings['password'];
        return $this;
    }
}

class CacheConfigurator implements ConfigurationInterface
{
    use ConnectionTrait;

    public function configure() :ConfigurationInterface
    {
        $this->configuration['host'] = $this->settings['host'];
        $this->configuration['port'] = $this->settings['poer'];
        $this->configuration['user'] = $this->settings['user'];
        $this->configuration['password'] = $this->settings['password'];
        return $this;
    }
}
