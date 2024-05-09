<?php

namespace App\Enums;

enum PurchaceStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';
    case BEING_SHIPPED = 'being shipped';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}
