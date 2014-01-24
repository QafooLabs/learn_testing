<?php

namespace Qafoo;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $checkout;

    private $displayMock;

    public function setUp()
    {
        $this->displayMock = $this->getMock('Qafoo\\Display');

        $this->checkout = new Checkout(
            $this->displayMock,
            new PriceLookup()
        );
    }

    public function testScanSingleProduct()
    {
        $checkout = $this->checkout;

        $checkout->scan('pear');

        $this->assertSame(
            0.59,
            $checkout->getSum()
        );
    }

    public function testScanMultipleProducts()
    {
        $checkout = $this->checkout;

        $checkout->scan('pear');
        $checkout->scan('apple');

        $this->assertSame(
            1.0,
            $checkout->getSum()
        );
    }

    public function testDisplaysSumAfterScanning()
    {
        $checkout = $this->checkout;

        $this->displayMock->expects($this->once())
            ->method('show');

        $checkout->scan('pear');
    }

    public function testScanNonExistentProductThrowsException()
    {
        $checkout = $this->checkout;

        $this->setExpectedException('\RuntimeException');

        $checkout->scan('banana');
    }
}
