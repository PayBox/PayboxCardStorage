<?php

/*
 * This file is part of the CardStorage package in (c)Paybox Integration Component.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Paybox\CardStorage\Models;

use Paybox\Core\Abstractions\Customer as CoreCustomer;

/**
 * @see Paybox\Core\Abstractions\Customer
 *
 * @package Paybox\CardStorage\Models
 * @version 1.1.0
 * @copyright LLC Paybox.money
 * @license GPLv3 @link https://www.gnu.org/licenses/gpl-3.0-standalone.html
 *
 * @property-write string $id
 * @property-write string $userEmail
 *
 * @method setId(string $id):bool
 * @method setUserEmail(string $email):bool
 * @method setPhone(real $phone):bool
 * @method setIp(string $ip):bool
 *
 */

final class Customer extends CoreCustomer {

    public function __construct() {
        $this->required('id');
    }

}
