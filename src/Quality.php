<?php

class Quality
{
    const max = 50;
    const min = 0;
    private $amount;

    public function __construct($quality)
    {
        $this->amount = $quality;
    }

    public function getAmount()
    {
        return $this->amount;
    }


    public function add($amount)
    {
        $this->amount += $amount;
        if ($this->amount < self::min) {
            $this->amount = self::min;
        }
        if ($this->amount > self::max) {
            $this->amount = self::max;
        }

    }
}