<?php

/**
 * Create a class Product that represents a product sold in a shop. A product has a price, amount and name.
 *
 * The class should have:
 *      A constructor Product __construct(string name, float startPrice, int amount)
 *      A function printProduct() that prints a product in the following form:
 *      Banana, price 1.1, amount 13
 *
 *      Test your code by creating a class with main method and add three products there:
 *          "Logitech mouse", 70.00 EUR, 14 units
 *          "iPhone 5s", 999.99 EUR, 3 units
 *          "Epson EB-U05", 440.46 EUR, 1 units
 *          Print out information about them.
 *
 * Add new behaviour to the Product class:
 *      possibility to change quantity
 *      possibility to change price
 *
 *      Reflect your changes in a working application.
 */

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct() : string
    {
        return "$this->name, $this->price EUR, amount $this->amount";
    }

    public function setPrice(float $newPrice): void
    {
        $this->price = $newPrice;
    }

    public function setAmount(int $newAmount): void
    {
        $this->amount = $newAmount;
    }
}

$item = new Product('"Logitech mouse"', 70.00, 14);
$item2 = new Product('"iPhone 5s"', 999.99, 3 );
$item3 = new Product('"Epson EB-U05"', 440.46, 1);

echo $item->printProduct() . PHP_EOL;
echo $item2->printProduct() . PHP_EOL;
echo $item3->printProduct() . PHP_EOL;

$item2->setPrice(1000);
$item3->setAmount(5);

echo $item->printProduct() . PHP_EOL;
echo $item2->printProduct() . PHP_EOL;
echo $item3->printProduct() . PHP_EOL;