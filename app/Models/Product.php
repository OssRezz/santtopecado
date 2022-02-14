<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'fkStatus',
        'productName',
        'productPrice',
    ];
    
    public $timestamps = false;


    public function Sales()
    {
        return $this->hasMany(Sales::class, 'foreign_key', 'id');
    }

    public function Status()
    {
        return $this->belongsTo(Status::class, 'foreign_key', 'fkStatus');
    }
}
