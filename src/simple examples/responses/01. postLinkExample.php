<?php

use Paybox\CardStorage\Facade as CardStorage;

$cardStorage = new CardStorage();
$cardStorage->merchant->id = 123456;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';

$request = (array_key_exists('pg_xml', $_REQUEST))
    ? $cardStorage->parseXML($_REQUEST)
    : $_REQUEST;

// example of $request
// [pg_type] => approve
// [pg_payment_id] => 152673
// [pg_order_id] => 12346578
// [pg_card_3ds] => 12346578
// [pg_card_hash] => 12346578
// [pg_card_id] => 431231
// [pg_user_id] => 431231
// [pg_status] => success
// [pg_card_month] => 12
// [pg_card_year] => 25
// [pg_salt] => bd4dadeb60dc008d1e13ed0b3ac058d8
// [pg_sig] => 1bc9f1cb0e061c16ab32c86d2ae19a0a

if ($cardStorage->checkSig($request)) {
    echo $request['pg_status'] == 'success' ? 'Card added' : 'Error';
} else {
    echo 'Error. Sig invalid';
}