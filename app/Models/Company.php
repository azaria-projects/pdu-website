<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use Filterable;

    protected $table    = 'companies';
    protected $with     = [
        'address',
        'files'
    ];
    protected $fillable = [
        'name',  
        'motto',
        'email', 
        'vision', 
        'icon_id',
        'mission',
        'facebook',
        'linkedin',
        'instagram',
        'address_id',
        'is_partner'
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [ 
            'name',
            'motto',
            'email',
            'vision',
            'mission',
            'facebook',
            'linkedin',
            'instagram'    
        ];
    }

    public function testimony(): HasOne
    {
        return $this->hasOne(Testimony::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function files(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
