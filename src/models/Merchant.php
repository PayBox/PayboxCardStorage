<?php

/*
 * This file is part of the CardStorage package in (c)Paybox Integration Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Paybox\CardStorage\Models;

use Paybox\Core\Abstractions\Merchant as CoreMerchant;

/**
 * @see Paybox\Core\Abstractions\Merchant
 *
 * @package Paybox\CardStorage\Models
 * @version 1.1.0
 * @copyright LLC Paybox.money
 * @license GPLv3 @link https://www.gnu.org/licenses/gpl-3.0-standalone.html
 *
 * @property-write int $id
 * @property-write string $secretKey
 *
 * @method setId(int $merchantId):bool
 * @method setSecretKey(string $string):bool
 *
 */

final class Merchant extends CoreMerchant {

}
