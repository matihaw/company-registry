<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Employee extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    /**
     * @return BelongsTo<Company, $this>
     */
    public function company(): belongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
