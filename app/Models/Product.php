<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Brand;
class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = "id";
    public function getBrand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function getProductCodeAttribute($code){
        return '#'.$code;
    }
}