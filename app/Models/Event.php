<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
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
