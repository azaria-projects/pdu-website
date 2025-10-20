<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use Filterable;

    protected $table    = 'addresses';
    protected $fillable = [
        'city',
        'street', 
        'country',
        'province',  
        'pos_code',
        'company_id'
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [ 
            'city',
            'street',
            'country',
            'province',
            'pos_code'  
        ];
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }
}
