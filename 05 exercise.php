<?php
/**
 * Create a class called Date that includes: three pieces of information as instance
 * variables — a month, a day and a year.
 * Your class should have a constructor that initializes the three instance
 * variables and assumes that the values provided are correct. Provide a set and a get for each instance variable.
 * Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.
 * Write a test application named DateTest that demonstrates class Date capabilities.
 */

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {

        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): string
    {
        return "{$this->month}/{$this->day}/{$this->year}";
    }
}

$date1 = new Date(8, 28, 2012);
$date2 = new Date(12, 11, 2021);
$date3 = new Date(6, 3, 1990);

echo $dateTest = $date1->displayDate() . PHP_EOL;

$date2->setMonth(4);
echo $dateTest2 = $date2->displayDate() . PHP_EOL;

$date3->setYear(1855);
echo $dateTest3 = $date3->displayDate() . PHP_EOL;

echo $dateTest4 = $date1->getDay() + $date2->getDay() + $date3->getDay() . PHP_EOL;

echo $dateTest5 = "{$date1->getDay()}.{$date2->getMonth()}.{$date3->getYear()}." . PHP_EOL;