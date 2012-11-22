<?php

namespace BladeTester\ChainedStubsBundle\Tests;

use BladeTester\ChainedStubsBundle\Model\StubChainer;

class StubChainerTest extends \PHPUnit_Framework_TestCase {

    private $chainer;
    private $stub;

    public function setUp() {
        $this->chainer = new StubChainer($this);
        $this->stub = $this->getMock('ChainStub', array('method1'));
    }

    public function testItChainsOneMethod() {
        // Arrange
        $this->chainer->chain($this->stub, array('method1'), 'returnValue');

        // Act
        $value = $this->stub->method1();

        // Assert
        $this->assertEquals($value, 'returnValue');
    }

    public function testItChainsTwoMethods() {
        // Arrange
        $this->chainer->chain($this->stub, array('method1', 'method2'), 'returnValue');

        // Act
        $value = $this->stub->method1()->method2();

        // Assert
        $this->assertEquals($value, 'returnValue');
    }


    public function testItChainsThreeMethods() {
        // Arrange
        $this->chainer->chain($this->stub, array('method1', 'method2', 'method3'), 'returnValue');

        // Act
        $value = $this->stub->method1()->method2()->method3();

        // Assert
        $this->assertEquals($value, 'returnValue');
    }



    public function testItChainsFourMethods() {
        // Arrange
        $this->chainer->chain($this->stub, array('method1', 'method2', 'method3', 'method4'), 'returnValue');

        // Act
        $value = $this->stub->method1()->method2()->method3()->method4();

        // Assert
        $this->assertEquals($value, 'returnValue');
    }

    public function testItThrowsAnExceptionIfNoMethodsAreProvided() {
        $this->assertTrue(false, 'Not implemented');
    }
}