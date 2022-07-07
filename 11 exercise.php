<?php
/**
 * The object of the class Account represents a bank account that has a balance
 * (meaning some amount of money). The accounts are used as follows:
 *      $bartos_account = new Account("Barto's account", 100.00);
 *      $bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);
 *
 *      echo "Initial state";
 *      echo $bartos_account;
 *      echo $bartos_swiss_account;
 *
 *      $bartos_account->withdrawal(20);
 *      echo "Barto's account balance is now: " . $bartos_account->balance();
 *      $bartos_swiss_account->deposit(200);
 *      echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance();
 *
 *      echo "Final state";
 *      echo $bartos_account;
 *      echo $bartos_swiss_account;
 *
 * Your first account
 * Create a program that creates an account with the balance of 100.0, deposits 20.0 and prints the account.
 * Note! do all the steps described in the exercise exactly in the described order!
 *
 * Your first money transfer
 * Create a program that:
 *      Creates an account named "Matt's account" with the balance of 1000
 *      Creates an account named "My account" with the balance of 0
 *      Withdraws 100.0 from Matt's account
 *      Deposits 100.0 to My account
 *      Prints both accounts
 *      Money transfers
 * In the above program, you made a money transfer from one person to another.
 * Let us next create a method that does the same!
 *
 * Create the method:
 *      function transfer(Account $from, Account $to, int $howMuch) { }
 * The method transfers money from one account to another.
 * You do not need to check that the from account has enough balance.
 *
 * After completing the above, make sure that your main method does the following:
 *      Creates an account "A" with the balance of 100.0
 *      Creates an account "B" with the balance of 0.0
 *      Creates an account "C" with the balance of 0.0
 *      Transfers 50.0 from account A to account B
 *      Transfers 25.0 from account B to account C
 */

class Account
{
    private string $name;
    private float $balance;

    private float $amount = 0;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function withdrawal(float $amount): float
    {
        return $this->balance -= $amount;
    }

    public function deposit(float $amount): float
    {
        return $this->balance += $amount;
    }
/**
    public function transfer(Account $from, Account $to, float $howMuch)
    {
        $from->$this->balance -= $howMuch;
        $to->$this->balance += $howMuch;
    }
 */
}

$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartosAccount->getName() . PHP_EOL;
echo number_format($bartosSwissAccount->getBalance(), 2) . PHP_EOL;

$bartosAccount->withdrawal(20);
echo "Barto's account balance is now: " . number_format($bartosAccount->getBalance(), 2) . PHP_EOL;
$bartosSwissAccount->deposit(200);
echo "Barto's Swiss account balance is now: " . number_format($bartosSwissAccount->getBalance(), 2) . PHP_EOL;

echo "Final state" . PHP_EOL;
echo number_format($bartosAccount->getBalance(), 2) . PHP_EOL;
echo number_format($bartosSwissAccount->getBalance(), 2) . PHP_EOL;
echo PHP_EOL;


$mattsAccount = new Account("Matt's account", 1000.00);
$myAccount = new Account("My account", 00.00);

$mattsAccount->withdrawal(100);
echo "Matt's account balance is now: " . number_format($mattsAccount->getBalance(), 2) . PHP_EOL;
$myAccount->deposit(100);
echo "My account balance is now: " . number_format($myAccount->getBalance(), 2) . PHP_EOL;
echo PHP_EOL;

function transfer(Account $from, Account $to, int $howMuch) {
    $from->withdrawal($howMuch);
    $to->deposit($howMuch);
}

$accountA = new Account('A', 100);
$accountB = new Account('B', 0);
$accountC = new Account('C', 0);

/**
$accountA->transfer($accountA, $accountB, 50);
$accountB->transfer($accountB, $accountC, 25);
 */

transfer($accountA, $accountB, 50);
transfer($accountB, $accountC, 25);

echo "A's balance is now: " . number_format($accountA->getBalance(), 2) . PHP_EOL;
echo "B's balance is now: " . number_format($accountB->getBalance(), 2) . PHP_EOL;
echo "C's balance is now: " . number_format($accountC->getBalance(), 2) . PHP_EOL;
echo PHP_EOL;