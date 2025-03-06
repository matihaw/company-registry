<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class CompanyAddress extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'city',
        'street',
        'country',
        'zip'
    ];
}
