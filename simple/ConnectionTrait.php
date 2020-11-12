<?php


trait ConnectionTrait
{
    protected $settings;
    protected $configuration;

    public function setConnection($settings)
    {
        $this->settings = $settings;
    }

}