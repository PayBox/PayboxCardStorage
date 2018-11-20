<?php

use Paybox\CardStorage\Facade as CardStorage;

$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->customer->id = 123;

$result = $cardStorage->getCardList();