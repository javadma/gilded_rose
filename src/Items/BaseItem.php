<?php
abstract class BaseItem
{
    public $quality;
    public $saleInDegradation = 1;
    public $sellIn;


    public function __construct($quality, $sellIn)
    {
        $this->quality = new Quality($quality);
        $this->sellIn = $sellIn;
    }
    public function updateSaleIn()
    {
        $this->sellIn -= $this->saleInDegradation;
    }
    public function preSellIn()
    {
        $this->quality->add($this->preInSell);
    }

    public function afterSellIn()
    {
        $this->quality->add($this->afterInSell);
    }
}