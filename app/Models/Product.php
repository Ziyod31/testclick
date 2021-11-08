<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'name', 'price', 'description', 'photo'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
