<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;
class SellOrderMongoDB extends Eloquent
{
    protected $connection   =   'mongodb';

    protected $collection   =   'sell_orders';
}
