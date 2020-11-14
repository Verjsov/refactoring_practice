<?php

interface WorkingInterface
{
    public function working():string;
}

//Hint - Open Closed Principle
class AnotherProgrammer implements WorkingInterface
{
    public function working():string
    {
        return 'coding';
    }
}
class Tester implements WorkingInterface
{
    public function working():string
    {
        return 'testing';
    }
}
class Designer implements WorkingInterface
{
    public function working():string
    {
        return 'drawing';
    }
}

/** Что если добавить еще класс Designer с методом draw() **/

class ProjectManagement
{
    public function process(WorkingInterface $member)
    {
        return $member->working();
    }
}

