<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodGroup extends Model
{
    use HasFactory;
    protected $table = 'foods_groups';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function foods(): HasMany
    {
        return $this->hasMany(Food::class, 'group_id')->where('is_active', '=', true);
    }
}
