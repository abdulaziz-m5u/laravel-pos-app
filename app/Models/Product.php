<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute(){
        return $this->getMedia('image')->last();
    }
}
