<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //fillable guarded
    protected $guarded = [];

    // relations children

    public function childrens(){ // get how are childrens
        return $this->hasMany(Category::class, 'parent_id','id');
    }

    public function parent(){// get how are parent
        return $this->belongsTo(Category::class, 'parent_id','id');
    }

    public function products(){ // get how are childrens
        return $this->hasMany(product::class   );
    }
}
