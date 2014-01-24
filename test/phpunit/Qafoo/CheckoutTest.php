<?php

namespace Qafoo;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    public function testScanSingleProduct()
    {
        $checkout = new Checkout();

        $checkout->scan('pear');

        $this->assertSame(
            0.59,
            $checkout->getSum()
        );
    }

    public function testScanMultipleProducts()
    {
        $checkout = new Checkout();

        $checkout->scan('pear');
        $checkout->scan('apple');

        $this->assertSame(
            1.0,
            $checkout->getSum()
        );
    }
}
