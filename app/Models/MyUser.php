<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    use HasFactory;
    protected $fillable = ['phone_number','full_name','password', 'role'];
    public $timestamps = false;
}
