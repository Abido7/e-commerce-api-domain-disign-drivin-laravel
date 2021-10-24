<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static PostStatusEnum FOO()
 * @method static PostStatusEnum BAR()
 * @method static PostStatusEnum BAZ()
 */
final class OrderStatusEnum extends Enum
{
    const __default = self::PENDING;

    const PENDING = 'pending';
    const PREPARING = 'preparing';
    const ONTHEWAY = 'on the way';
    const ARRIVED = 'arrived';
}