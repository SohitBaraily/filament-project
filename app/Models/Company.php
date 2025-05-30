<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'logo',
    ];

    /**
     * Get all of the company_contact for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company_contact(): HasMany
    {
        return $this->hasMany(CompanyContact::class);
    }
}
