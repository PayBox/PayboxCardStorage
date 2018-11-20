<?php

/*
 * This file is part of the CardStorage package in (c)Paybox Integration Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Paybox\CardStorage\Models;

use Paybox\Core\Abstractions\Config as CoreConfig;

/**
 * @see Paybox\Core\Abstractions\Config
 *
 * @package Paybox\CardStorage\Models
 * @version 1.1.0
 * @copyright LLC Paybox.money
 * @license GPLv3 @link https://www.gnu.org/licenses/gpl-3.0-standalone.html
 *
 * @property string $currency
 * @property-write string $paymentSystem
 * @property string $encoding
 *
 * @method setCurencty(string $currency):bool
 * @method getCurrency():string
 * @method setPaymentSystem(string $paymentSystem):bool
 * @method setEncoding(string $charset):bool
 * @method getEncoding():string
 * @method setPostLink(string $url):bool
 * @method setbackLink(string $url):bool
 *
 */

final class Config extends CoreConfig {

    /**
     * @var url $postLink It must be a link on real url of Your website
     * Set value, if Paybox must send a card adding result to Your website
     */
    public $postLink;

    /**
     * @var url $postLink It must be a link on real url of Your website
     * This url will be use when card added, for redirecting a user
     */
    public $backLink;
}
