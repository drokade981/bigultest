<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
    ];

    /**
     * Get the combo plans for the plan.
     */
    public function combo(): HasMany
    {
        return $this->hasMany(ComboPlan::class);
    }

    function addPlan() 
    {
        return $this->create($data);
    }
}
