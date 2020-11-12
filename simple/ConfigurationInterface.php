<?php


interface ConfigurationInterface
{
    public function setConnection($settings);
    public function configure();
}