<?php
/**
 * See energy-drinks.php
 * A soft drink company recently surveyed 12,467 of its customers and found that
 * approximately 14 percent of those surveyed purchase one or more energy drinks per week.
 * Of those customers who purchase energy drinks, approximately 64 percent of them prefer
 * citrus flavored energy drinks.
 *
 * Write a program that displays the following:
 *      The approximate number of customers in the survey who purchased one or more energy drinks per week
 *      The approximate number of customers in the survey who prefer citrus flavored energy drinks
 */

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(float $numberSurveyed, float $percentage_purchased_energy_drinks): int
{
    return floor($numberSurveyed * $percentage_purchased_energy_drinks);
}

function calculate_prefer_citrus(int $numberSurveyed, float $percentage_prefer_citrus_drinks): int
{
    return floor($numberSurveyed * $percentage_prefer_citrus_drinks);
}


echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . calculate_energy_drinkers($surveyed, $purchased_energy_drinks) . " bought at least one energy drink" . PHP_EOL;
echo calculate_prefer_citrus($surveyed, $prefer_citrus_drinks) . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
