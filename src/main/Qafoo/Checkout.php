<?php

namespace Qafoo;

class Checkout
{
    private $sum = 0;

    private $products;

    public function __construct()
    {
        $this->products = array(
            'pear' => 0.59,
            'apple' => 0.41,
        );
    }

    public function scan($article)
    {
        $this->sum += $this->products[$article];
    }

    public function getSum()
    {
        return $this->sum;
    }
}
