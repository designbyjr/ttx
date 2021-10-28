<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incomes extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'customer_id',
        'description',
        'income',
        'income_date',
        'tax_year',
        'income_file'
    ];
}
