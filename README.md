# PayboxCardStorage
___
Пакет упрощает работу с картами Paybox.

## 1) Установка пакета

Для установки пакета пропишите команду в консольке:

```sh
$ composer require payboxmoney/cardstorage
```

## 2) Запросы
  - [Запрос на инициализацию iframe](#Запрос-на-инициализацию-iframe)
  - [Получение списка карт](#Получение-списка-карт)
  - [Удаление карты](#Удаление-карты)
  - [Инициализации платежа для оплаты сохраненной картой](#Инициализации-платежа-для-оплаты-сохраненной-картой)
  - [Проведение платежа сохраненной картой](#Проведение-платежа-сохраненной-картой)

### Запрос на инициализацию iframe

[Подробное описание](https://paybox.money/docs/ru/pay-in/3.3#tag/Rabota-s-kartami/paths/~1v1~1merchant~1{merchant_id}~1cardstorage~1add/post)

#### Пример
~~~php
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
~~~

---

### Получение списка карт

[Подробное описание](https://paybox.money/docs/ru/pay-in/3.3#tag/Rabota-s-kartami/paths/~1v1~1merchant~1{merchant_id}~1cardstorage~1list/post)

#### Пример
~~~php
<?php
use Paybox\CardStorage\Facade as CardStorage;
$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->customer->id = 123;
$result = $cardStorage->getCardList();
~~~

---

### Удаление карты

[Подробное описание](https://paybox.money/docs/ru/pay-in/3.3#tag/Rabota-s-kartami/paths/~1v1~1merchant~1{merchant_id}~1cardstorage~1remove/post)

#### Пример
~~~php
<?php
use Paybox\CardStorage\Facade as CardStorage;
$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->customer->id = 123;
$cardStorage->card->id = 456;
$result = $cardStorage->removeCard();
~~~

---

### Инициализации платежа для оплаты сохраненной картой

[Подробное описание](https://paybox.money/docs/ru/pay-in/3.3#tag/Rabota-s-kartami/paths/~1v1~1merchant~1{merchant_id}~1card~1init/post)

#### Пример
~~~php
<?php
use Paybox\CardStorage\Facade as CardStorage;
$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->customer->id = 123;
$cardStorage->card->id = 456;
$cardStorage->order->id = 789;
$cardStorage->order->description = 'Description';
$cardStorage->order->amount = 1999;
$result = $cardStorage->initPayment();
~~~

---

### Проведение платежа сохраненной картой

[Подробное описание](https://paybox.money/docs/ru/pay-in/3.3#tag/Rabota-s-kartami/paths/~1v1~1merchant~1{merchant_id}~1card~1pay/post)

#### Пример
~~~php
<?php
use Paybox\CardStorage\Facade as CardStorage;
$cardStorage = new CardStorage();
$cardStorage->merchant->id = 12345;
$cardStorage->merchant->secretKey = 'asflerjgsdfv';
$cardStorage->payment->id = 456;
$result = $cardStorage->pay();
~~~
