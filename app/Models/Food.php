<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = ['name','money', 'is_active'];
    public $timestamps = false;
}
