<?php
require("payday.php");
require("csv_controller.php");

$pay_day = new Payday();
$nextYearResult = $pay_day -> payDaysForNextYear("August 2022");


CsvController::write_csv('Paydaysfornext12months.csv',$nextYearResult);
 
