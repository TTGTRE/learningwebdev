<?php

class Animal
{
// Maximum age in years
    public const MAX_AGE = 50;

    protected $color;
    protected $age;

    public function __construct(string $color, int $age)
    {
        $this->color = $color;
        $this->age = $age;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function save($fileName) {
        $fileHandle = fopen($fileName, "w") or die("Error while saving animal.");
        fwrite($fileHandle, $this->getWritableContents());
        fclose($fileHandle);
    }

    private function getWritableContents() { //TODO Paramater of array for variable names
       return "$this->color, $this->age";
    }
}