<?php

namespace Qafoo;

class Checkout
{
    private $sum = 0;

    private $products;

    private $display;

    public function __construct(Display $display)
    {
        $this->display = $display;
        $this->products = array(
            'pear' => 0.59,
            'apple' => 0.41,
        );
    }

    public function scan($article)
    {
        $this->sum += $this->products[$article];
        $this->display->show($this->sum);
    }

    public function getSum()
    {
        return $this->sum;
    }
}
