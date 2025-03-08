<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Company extends Model
{
    use HasFactory;

    protected $with = ['address'];

    public $timestamps = false;

    protected $fillable = [
        'name',
        'nip',
    ];

    /**
     * @return HasMany<Employee, $this>
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * @return HasOne<CompanyAddress, $this>
     */
    public function address(): HasOne
    {
        return $this->hasOne(CompanyAddress::class);
    }
}
