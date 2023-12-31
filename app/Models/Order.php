<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['money'];
    public $timestamps = true;
}
