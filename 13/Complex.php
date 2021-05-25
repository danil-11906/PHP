<?php


class Complex
{
    public $real;
    public $imaginary;

    public function __construct($real = 0, $imaginary = 0)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    public function __toString()
    {
        if ($this->imaginary>=0)
        {
            return $this->real."+".$this->imaginary . "i";
        }
        else
        {
            return $this->real."".$this->imaginary . "i";
        }
    }

    public function getReal()
    {
        return $this->real;
    }

    public function getImaginary()
    {
        return $this->imaginary;
    }

    public function setReal($real)
    {
        $this->real = $real;
    }

    public function setImaginary($imaginary)
    {
        $this->imaginary = $imaginary;
    }

    public function add(Complex $number): Complex
    {
        $result= new Complex();
        if (get_class($number)!=Complex::class)
        {
            $elem = new Complex($number);
        }
        $result->setImaginary($this->getImaginary()+$number->getImaginary());
        $result->setReal($this->getReal()+$number->getReal());
        print_r($result);
        return $result;
    }

    public function sub(Complex $number): Complex
    {
        $result =  new Complex($this->getReal() - $number->getReal(),
            $this->getImaginary() - $number->getImaginary());
        print_r($result);
        return $result;
    }

    public function mult(Complex $number): Complex
    {
        $result = new Complex($this->getReal() * $number->getReal() - $this->getImaginary() * $number->getImaginary(),
            $this->getReal() * $number->getImaginary() + $number->getReal() * $this->getImaginary());
        print_r($result);
        return $result;
    }

    /**
     * @throws Exception
     */
    public function div(Complex $number): Complex
    {
        $usReal = $this->getReal();
        $usImaginary = $this->getImaginary();
        $numberReal = $number->getReal();
        $numberImaginary = $number->getImaginary();
        $div = $numberImaginary * $numberImaginary + $numberReal * $numberReal;
        if ($div == 0)
        {
            throw new Exception("Div = 0");
        }
        $result = new Complex(($usReal * $numberReal + $usImaginary * $numberImaginary)/$div,
            ($usImaginary * $numberReal - $usReal * $numberImaginary)/$div);
        print_r($result);
        return $result;
    }

    public function abs(): float
    {
        $real = $this->real;
        $imaginary = $this->imaginary;
        $result = sqrt($imaginary * $imaginary + $real * $real);
        print_r($result);
        return $result;
    }
}