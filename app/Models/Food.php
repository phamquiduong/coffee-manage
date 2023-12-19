<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = ['name', 'money', 'is_active', 'group_id'];
    public $timestamps = false;

    public function group(): BelongsTo
    {
        return $this->belongsTo(FoodGroup::class);
    }
}
