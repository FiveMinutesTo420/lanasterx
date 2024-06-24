<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Season;
use App\Models\Type;

use App\Models\Gender;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
