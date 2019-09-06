<?php
$ds = DIRECTORY_SEPARATOR;
require __DIR__ . $ds . 'Quality.php';

require __DIR__ . $ds . 'items' . $ds . 'BaseItem.php';
require __DIR__ . $ds . 'items' . $ds . 'ItemFactory.php';
require __DIR__ . $ds . 'items' . $ds . 'Normal.php';
require __DIR__ . $ds . 'items' . $ds . 'Sulfur.php';
require __DIR__ . $ds . 'items' . $ds . 'Ticket.php';
require __DIR__ . $ds . 'items' . $ds . 'Torshi.php';
require __DIR__ . $ds . 'items' . $ds . 'Cake.php';


ItemFactory::instance('گوگرد', 'Sulfur');
ItemFactory::instance('عادی', 'Normal');
ItemFactory::instance('ترشی', 'Torshi');
ItemFactory::instance('بلیت هواپیما', 'Ticket');
ItemFactory::instance('کیک خامه ای', 'Cake');

Interface Item
{
    public function updateSaleIn();

    public function preSellIn();

    public function afterSellIn();
}

class GildedRose
{
    /**
     * @var Item
     */
    public $quality;
    public $sellIn;
    private $item;

    public function __construct($name, $quality, $sellIn)
    {
        $item = ItemFactory::makeItemObj($name, [$quality, $sellIn]);
        $this->addItem($item);
    }

    private function addItem(Item $item)
    {
        $this->item = $item;
    }

    public function getQuality()
    {
        return $this->item->quality->getAmount();
    }

    public function getSellIn()
    {
        return $this->sellIn;
    }

    public function tick()
    {
        $this->item->updateSaleIn();
        $m = $this->item->sellIn >= 0 ? 'preSellIn' : 'afterSellIn';
        $this->item->$m();
    }


}

