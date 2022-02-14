<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function Event()
    {
        return $this->belongsTo(Status::class, 'foreign_key', 'fkEvent');
    }
    public function Products()
    {
        return $this->belongsTo(Status::class, 'foreign_key', 'fkProduct');
    }
}
