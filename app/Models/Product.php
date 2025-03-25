<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'photo', 'description', 'price', 'sku', 'in_stock'
    ];

    /**
     * Define the relationship with the Review model.
     * A product can have many reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Calculate the average rating of the product.
     * 
     * @return float
     */
    public function averageRating()
    {
        // Check if there are any reviews
        if ($this->reviews->count() > 0) {
            // Calculate and return the average rating
            return $this->reviews->avg('rating');
        }

        return 0; // Return 0 if there are no reviews
    }
}
