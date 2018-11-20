<?php

/*
 * This file is part of the CardStorage package in (c)Paybox Integration Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Paybox\CardStorage;

use Paybox\Core\Exceptions\Property as PropertyException;
use Paybox\Core\Exceptions\Connection as ConnectionException;
use Paybox\Core\Exceptions\Request as RequestException;
use Paybox\Core\Abstractions\DataContainer;
use Paybox\Core\Interfaces\CardStorage as CardStorageInterface;

/**
 * Facade of Paybox\CardStorage classes
 * Simple facade for comfortable using a whole Paybox card storage functionality
 *
 * @package Paybox\CardStorage
 * @version 1.1.0
 * @copyright LLC Paybox.money
 * @license GPLv3 @link https://www.gnu.org/licenses/gpl-3.0-standalone.html
 *
 * @property Paybox\CardStorage\Models\Card $card
 * @property Paybox\CardStorage\Models\Config $config
 * @property Paybox\CardStorage\Models\Customer $customer
 * @property Paybox\CardStorage\Models\Merchant $merchant
 * @property Paybox\CardStorage\Models\Order $order
 * @property Paybox\CardStorage\Models\Payment $payment
 *
 */

class Facade extends DataContainer implements CardStorageInterface {

    /**
     * @var url $url
     */
    public $url;

    /**
     *
     * This method initialize a frame for add card
     *
     * Method get all required params, check filling and send request to Paybox
     *
     * @return array|Exception
     *
     */

    public function addCard() {
        try {
            $this->save("v1/merchant/{$this->merchant->id}/cardstorage/add", false);
            $this->send();
            return $this->getFullServerAnswer();
        } catch(PropertyException $e) {
            echo $e->getMessage();
        } catch(ConnectionException $e) {
            echo $e->getMessage();
        } catch(RequestException $e) {
            echo $e->getMessage();
        }

        return [];
    }

    /**
     *
     * This method send request to paybox, for getting a list of card
     *
     * @return array|Exception
     *
     */

    public function getCardList() {
        try {
            $this->save("v1/merchant/{$this->merchant->id}/cardstorage/list", false);
            $this->send();
            return $this->getFullServerAnswer()['card'] ? $this->getFullServerAnswer()['card'] : [];
        } catch(PropertyException $e) {
            echo $e->getMessage();
        } catch(ConnectionException $e) {
            echo $e->getMessage();
        } catch(RequestException $e) {
            echo $e->getMessage();
        }

        return [];
    }

    /**
     *
     * This method remove card from card storage
     *
     * @return bool|Exception
     *
     */

    public function removeCard() {
        try {
            $this->save("v1/merchant/{$this->merchant->id}/cardstorage/remove", false);
            $this->send();
            $result = $this->getFullServerAnswer();

            if (isset($result['card']) && $result['card']->pg_status == 'deleted') {
                return true;
            }

            return false;
        } catch(PropertyException $e) {
            echo $e->getMessage();
        } catch(ConnectionException $e) {
            echo $e->getMessage();
        } catch(RequestException $e) {
            echo $e->getMessage();
        }

        return [];
    }

    /**
     *
     * This method create a payment for to pay it by saved card
     *
     * @return array|Exception
     *
     */

    public function initPayment() {
        try {
            $this->order->required('id');
            $this->order->required('amount');
            $this->order->required('description');
            $this->save("v1/merchant/{$this->merchant->id}/card/init", false);
            $this->send();
            return $this->getFullServerAnswer();
        } catch(PropertyException $e) {
            echo $e->getMessage();
        } catch(ConnectionException $e) {
            echo $e->getMessage();
        } catch(RequestException $e) {
            echo $e->getMessage();
        }

        return [];
    }

    /**
     *
     * This method send request to pay payment by saved card
     *
     * @return bool|Exception
     *
     */

    public function pay() {
        try {
            $this->payment->required('id');
            $this->save("v1/merchant/{$this->merchant->id}/card/pay", false);
            $this->send();
            return true;
        } catch(PropertyException $e) {
            echo $e->getMessage();
        } catch(ConnectionException $e) {
            echo $e->getMessage();
        } catch(RequestException $e) {
            echo $e->getMessage();
        }

        return [];
    }

    /**
     *
     * Parse a request from Paybox and return it as array
     *
     * @param XML $request
     *
     * @return array
     */

    public function parseXML($request) {
        return (array) (new \SimpleXMLElement($request['pg_xml']));
    }

    /**
     *
     * Get a url of Payment gate
     *
     * @return string
     *
     */

    protected function getBaseUrl() {
        return 'https://api.paybox.money/';
    }
}
