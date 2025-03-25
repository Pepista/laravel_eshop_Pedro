<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Define the table name (optional if it's 'reviews' by default)
    protected $table = 'reviews';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'product_id', 'user_id', 'rating', 'comment'
    ];

    /**
     * Define the relationship between Review and Product.
     * A review belongs to a single product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Define the relationship between Review and User.
     * A review is written by a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
