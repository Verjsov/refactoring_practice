<?php

//Hint - Open Closed Principle
class AnotherProgrammer
{
    public function code()
    {
        return 'coding';
    }
}
class Tester
{
    public function test()
    {
        return 'testing';
    }
}
class Designer
{
    public function draw()
    {
        return 'drawing';
    }
}

/** Что если добавить еще класс Designer с методом draw() **/

class ProjectManagement
{
    public function process($member)
    {
        if ($member instanceof AnotherProgrammer) {
            $member->code();
        } elseif ($member instanceof Tester) {
            $member->test();
        } elseif ($member instanceof Designer) {
            $member->draw();
        } else {
            throw new Exception('Invalid input member');
        }
    }
}

