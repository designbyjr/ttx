<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customers extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'utr',
        'dob',
        'profile_pic_url'
    ];

    public function income() : HasMany
    {
        return $this->hasMany(
            Incomes::class,
            'customer_id'
        );
    }
}
