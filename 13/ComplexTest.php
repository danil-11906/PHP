<?php
require_once 'Complex.php';
use PHPUnit\Framework\TestCase;
class ComplexTest extends TestCase
{
    public $oneComplex;
    public $twoComplex;
    public $zeroComplexReal;
    public $zeroComplexImage;
    public $zero;

    public function setUp(): void
    {
        $this->oneComplex = new Complex(3, 2);
        $this->twoComplex = new Complex(4, 3);
        $this->zeroComplexReal = new Complex(0, 4);
        $this->zeroComplexImage = new Complex(4, 0);
        $this->zero = new Complex();
    }

    function testOne()
    {
        $this->assertEquals(new Complex(3,2), $this->oneComplex);
    }

    public function testAddComplexNumber()
    {
        $this->assertEquals(new Complex(7, 5), $this->oneComplex->add($this->twoComplex));
    }

    public function testAddComplexZero()
    {
        $this->assertEquals($this->oneComplex, $this->oneComplex->add($this->zero));
    }

    public function testAddComplexZeroReal()
    {
        $this->assertEquals(new Complex(3, 6), $this->oneComplex->add($this->zeroComplexReal));
    }

    public function testAddComplexZeroImage()
    {
        $this->assertEquals(new Complex(7, 2), $this->oneComplex->add($this->zeroComplexImage));
    }

    public function testAddComplexMines()
    {
        $this->assertEquals(new Complex(-1, -2), $this->twoComplex->add(new Complex(-5, -5)));
    }



    public function testSubComplexNumber()
    {
        $this->assertEquals(new Complex(-1, -1), $this->oneComplex->sub($this->twoComplex));
    }

    public function testSubComplexZero()
    {
        $this->assertEquals($this->oneComplex, $this->oneComplex->sub($this->zero));
    }

    public function testSubComplexZeroReal()
    {
        $this->assertEquals(new Complex(3, -2), $this->oneComplex->sub($this->zeroComplexReal));
    }

    public function testSubComplexZeroImage()
    {
        $this->assertEquals(new Complex(-1, 2), $this->oneComplex->sub($this->zeroComplexImage));
    }

    public function testSubComplexMines()
    {
        $this->assertEquals(new Complex(9, 8), $this->twoComplex->sub(new Complex(-5, -5)));
    }

    public function testMultComplexNumber()
    {
        $this->assertEquals(new Complex(6, 17), $this->oneComplex->mult($this->twoComplex));
    }

    public function testMultComplexZero()
    {
        $this->assertEquals($this->zero, $this->oneComplex->mult($this->zero));
    }

    public function testMultComplexZeroReal()
    {
        $this->assertEquals(new Complex(-8, 12), $this->oneComplex->mult($this->zeroComplexReal));
    }

    public function testMultComplexZeroImage()
    {
        $this->assertEquals(new Complex(12, 8), $this->oneComplex->mult($this->zeroComplexImage));
    }

    public function testMultComplexMines()
    {
        $this->assertEquals(new Complex(-5, -35), $this->twoComplex->mult(new Complex(-5, -5)));
    }

    /**
     * @throws Exception
     */
    public function testDivComplexNumber()
    {
        $this->assertEquals(new Complex(0.72, -0.04), $this->oneComplex->div($this->twoComplex));
    }


    public function testDivComplexZero()
    {
        try {
            $this->oneComplex->div($this->zero);
        } catch (Exception $e) {
            $this->assertSame('Div = 0', $e->getMessage());
            return;
        }
        $this->fail('Exception not throw');
    }

    /**
     * @throws Exception
     */
    public function testDivComplexZeroReal()
    {
        $this->assertEquals(new Complex(0.5, -0.75), $this->oneComplex->div($this->zeroComplexReal));
    }

    /**
     * @throws Exception
     */
    public function testDivComplexZeroImage()
    {
        $this->assertEquals(new Complex(0.75, 0.5), $this->oneComplex->div($this->zeroComplexImage));
    }

    /**
     * @throws Exception
     */
    public function testDivComplexMines()
    {
        $this->assertEquals(new Complex(-0.7, 0.1), $this->twoComplex->div(new Complex(-5, -5)));
    }

    public function testAbsComplexNumber()
    {
        $this->assertEquals(sqrt(13), $this->oneComplex->abs());
    }

    public function testAbsComplexZero()
    {
        $this->assertEquals(0, $this->zero->abs());
    }

    public function testAbsComplexZeroReal()
    {
        $this->assertEquals(4, $this->zeroComplexReal->abs());
    }

    public function testAbsComplexZeroImage()
    {
        $this->assertEquals(4, $this->zeroComplexImage->abs());
    }

    public function testAbsTwoComplex()
    {
        $this->assertEquals(5, $this->twoComplex->abs());
    }

}
