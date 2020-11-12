<?php

//Hint - Interface Segregation Principle
interface CanCodeInterface
{
    public function canCode();
}
interface DevelopmentInterface
{
    public function code();
}
interface TesterInterface
{
    public function test();
}
interface ProjectInterface
{
    public function createNew();
}

class Programmer implements CanCodeInterface,DevelopmentInterface
{
    public function canCode()
    {
        return true;
    }
    public function code()
    {
        return 'coding';
    }
    public function test()
    {
        return 'testing in localhost';
    }
}

class Tester implements CanCodeInterface,TesterInterface
{
    public function canCode()
    {
        return false;
    }
    public function code()
    {
        throw new Exception('Opps! I can not code');
    }
    public function test()
    {
        return 'testing in test server';
    }
}

class ProjectManagement implements CanCodeInterface,ProjectInterface
{

    public function canCode()
    {
        return false;
    }

    public function createNew()
    {
        // TODO: Implement createNew() method.
    }
}
