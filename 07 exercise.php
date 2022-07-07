<?php
/**
 * The questions in this exercise all deal with a class Dog that you have to program from scratch.
 * Create a class Dog. Dogs should have a name, and a sex.
 * Make a class DogTest with a Main method in which you create the following Dogs:
 *          Max, male
 *          Rocky, male
 *          Sparky, male
 *          Buster, male
 *          Sam, male
 *          Lady, female
 *          Molly, female
 *          Coco, female
 * Change the Dog class so that each dog has a mother and a father.
 * Add to the main method in DogTest, so that:
 *      Max has Lady as mother, and Rocky as father
 *      Coco has Molly as mother, and Buster as father
 *      Rocky has Molly as mother, and Sam as father
 *      Buster has Lady as mother, and Sparky as father
 * Change the dog class to include a method fathersName that return the name of the father.
 * If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
 *      referenceToCoco.FathersName() returns the string "Buster"
 *      referenceToSparky.FathersName() returns the string "Unknown"
 * Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog).
 * The method should return true on the call
 *      referenceToCoco.HasSameMotherAs(referenceToRocky).
 * Show that the new method works in the DogTest main method.
 */

class Dog
{
    private string $name;
    private string $gender;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $gender, Dog $mother = null, Dog $father = null)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName() : string
    {
        if (! $this->father) return 'Unknown';

        return $this->father->name;
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        return $this->mother === $otherDog->mother;
    }
}

$dogs = [
    $sparky = new Dog('Sparky', 'male'),
    $sam = new Dog('Sam', 'male'),
    $lady = new Dog('Lady', 'female'),
    $molly = new Dog('Molly', 'female'),
    $buster = new Dog('Buster', 'male', $lady, $sparky),
    $rocky = new Dog('Rocky', 'male', $molly, $sam),
    $coco = new Dog('Coco', 'female', $molly, $buster),
    $max = new Dog('Max', 'male', $lady, $rocky),
];

var_dump($coco->fathersName());
var_dump($sparky->fathersName());
var_dump($coco->hasSameMotherAs($buster));
var_dump($max->hasSameMotherAs($buster));