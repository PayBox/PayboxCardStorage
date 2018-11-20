<?php

use Paybox\CardStorage\Facade as CardStorage;

$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->payment->id = 456;

$result = $cardStorage->pay();