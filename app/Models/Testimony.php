<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimony extends Model
{
    use Filterable;
    
    protected $table    = 'testimonies';
    protected $with     = [
        'company'
    ];
    protected $fillable = [
        'name', 
        'role', 
        'status',
        'testimony',
        'company_id'
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [
            'name',
            'role',
            'testimony'
        ];
    }

    public function company() : belongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
