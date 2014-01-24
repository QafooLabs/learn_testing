<?php

namespace Qafoo;

class PriceLookup
{
    private $products;

    public function __construct()
    {
        $this->products = array(
            'pear' => 0.59,
            'apple' => 0.41,
        );
    }

    public function getPrice($product)
    {
        if (!isset($this->products[$product])) {
            throw new \RuntimeException('Not a product from here!');
        }
        return $this->products[$product];
    }
}
