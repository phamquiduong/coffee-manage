<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodGroup extends Model
{
    use HasFactory;
    protected $table = 'foods_groups';
    protected $fillable = ['name'];
    public $timestamps = false;
}
