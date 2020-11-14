<?php

//Hint - Liskov Substitution Principle

interface Figure
{
    public function setHeight(int $height) : void;

    public function getHeight() : int;

    public function setWidth(int $width) : void;

    public function getWidth() : int;

    public function area() :int;

}

trait BaseFigureTrait
{
    protected $width;
    protected $height;

    public function getHeight() :int
    {
        return $this->height;
    }

    public function getWidth() :int
    {
        return $this->width;
    }
}

class Rectangle implements Figure
{
    use BaseFigureTrait;

    public function setHeight($height) :void
    {
        $this->height = $height;
    }

    public function setWidth($width) :void
    {
        $this->width = $width;
    }

    public function area() :int
    {
        return $this->height * $this->width;
    }
}

class Square implements Figure
{
    use BaseFigureTrait;

    public function setHeight($value) :void
    {
        $this->width = $value;
        $this->height = $value;
    }

    public function setWidth($value) :void
    {
        $this->width = $value;
        $this->height = $value;
    }

    public function area() :int
    {
        return (int) (pi()*pow($this->height,2))/4;
    }
}

class FigureTest
{
    private Figure $baseFigure;

    public function __construct(Figure $baseFigure)
    {
        $this->baseFigure = $baseFigure;
    }

    public function testArea() : string
    {
        $this->baseFigure->setHeight(2);
        $this->baseFigure->setWidth(3);
        if ($this->baseFigure instanceof Square){
            return $this->baseFigure->area() !== 7
                ? "Bad area \n"
                : "Test passed! \n";
        }
        if ($this->baseFigure instanceof Rectangle){
            return $this->baseFigure->area() !== 6
                ? "Bad area \n"
                : "Test passed! \n";
        }
        throw new Exception('Unknown type Figure');
    }
}

$rectangle = new Rectangle();
echo "Calc area for rectangle \n";
$rectangleTest = new FigureTest($rectangle);
try {
   echo $rectangleTest->testArea();
} catch (Exception $e){
    echo $e->getMessage();
}

$square = new Square();
echo "Calc area for square \n";
$rectangleTest = new FigureTest($square);
try {
    echo $rectangleTest->testArea();
} catch (Exception $e){
    echo $e->getMessage();
}
