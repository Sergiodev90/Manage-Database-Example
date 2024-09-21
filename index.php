<?php
use App\Controllers\IncomesController;
use App\Controllers\WithDrawalControler;
use App\Enums\PaymentMethodEnum;
use App\Enums\IncomeTypeEnum;
use App\Enums\WithDrawalTypeEnum;

require("vendor/autoload.php");


$incomes_controller = new IncomesController();

// $incomes_controller->store( [
//     "payment_method" => PaymentMethodEnum::BankAccount->value,
//     "type" => IncomeTypeEnum::Salary->value,
//     "date" => date("Y-m-d H:i:s"),
//     "amount" => 100000,
//     "description" => "Pago de mi salario por mi arduo y muy buen trabajo"
// ]);
// $incomes_controller->index();
// $incomes_controller->show(2);
$incomes_controller->destroy(4);

$withdrawal_controller = new WithDrawalControler();
// $withdrawal_controller->store([
//     "payment_method" => PaymentMethodEnum::CreditCard->value,
//     "type" => WithDrawalTypeEnum::Purchase->value,
//     "time" => date('Y-m-d H:i:s'),
//     "amount" => 80,
//     "description" => "Compre nuevos audifonos para escuchar mejor la musica"
// ]);



// $withdrawal_controller->index();

// $withdrawal_controller->show(3);