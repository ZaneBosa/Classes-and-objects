<?php

/**
 * Write a method named swapPoints that accepts two Points as parameters and swaps their x/y values.
 * Consider the following example code that calls swapPoints:
 *      $p1 = new Point(5, 2);
 *      $p2 = new Point(-3, 6);
 *      $p1->swapPoints($p1, $p2);
 *
 *      echo "(" . $p1->x . ", " . $p1->y . ")";
 *      echo "(" . $p2->x . ", " . $p2->y . ")";
 *
 * The output produced from the above code should be:
 *      (-3, 6)
 *      (5, 2)
 */

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }


    public function swapPoints(Point $a, Point $b) : void
    {
        $previousX = $a->x;
        $previousY = $a->y;
        $a->x = $b->x;
        $a->y = $b->y;
        $b->x = $previousX;
        $b->y = $previousY;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")" . PHP_EOL;
