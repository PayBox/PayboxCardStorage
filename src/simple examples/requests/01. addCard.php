<?php

use Paybox\CardStorage\Facade as CardStorage;

$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->customer->id = 123;

$cardStorage->getConfig()->setPostLink('http://site.ru/');
$cardStorage->getConfig()->setBackLink('http://site.ru/');

if ($cardStorage->addCard()) {
    header('Location:' . $cardStorage->redirectUrl);
}