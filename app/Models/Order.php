<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // The table associated with the model (optional if it matches plural of model name)
    protected $table = 'orders';

    // Add any fillable fields or relationships here if needed
    protected $fillable = ['order_number', 'customer_name', 'status', 'price', 'order_date'];
}
