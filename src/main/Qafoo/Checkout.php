<?php

namespace Qafoo;

class Checkout
{
    private $sum = 0;

    private $display;

    private $priceLookup;

    public function __construct(Display $display, PriceLookup $priceLookup)
    {
        $this->display = $display;
        $this->priceLookup = $priceLookup;
    }

    public function scan($article)
    {
        $this->sum += $this->priceLookup->getPrice($article);
        $this->display->show($this->sum);
    }

    public function getSum()
    {
        return $this->sum;
    }
}
