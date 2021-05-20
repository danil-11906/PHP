<?php
use exceptions as exceptions;
spl_autoload_register(function ($class) {
    require_once $class.'.php';
});
class MyClass
{
    public function  choose($num) {
        switch ($num){
            case 0:
                throw new exceptions\ExOne();
            case 1:
                throw new exceptions\ExTwo();
            case 2:
                throw new exceptions\ExThree();
            case 3:
                throw new exceptions\ExFour();
            case 4:
                throw new exceptions\ExFive();
        }
    }
    public function randException(){
        $num1=rand(0,4);
        $num2=rand(0,4);
        while($num2==$num1) {$num1=rand(0,4);}
        if (rand(0,1)) {
            $this->choose($num1);
        }
        else {
            $this->choose($num2);
        }
    }


    public function methodOne(){
        $this->randException();
    }
    public function methodTwo(){
        $this->randException();
    }
    public function methodThree(){
        $this->randException();
    }
    public function methodFour(){
        $this->randException();
    }

}
