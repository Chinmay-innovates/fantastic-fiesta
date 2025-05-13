<?php

namespace App\Enums;

enum PermissionsEnum:string
{
    case APPROVE_VENDORS = 'approve-vendors';
    case SELL_PRODUCTS = 'sell-products';
    case BUY_PRODUCTS = 'buy-products';
}
