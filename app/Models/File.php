<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use Filterable;

    protected $table    = 'files';
    protected $fillable = [ 
        'path', 
        'type', 
        'name',
        'size',
        'extension'
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [
            'type', 
            'name',
            'size',
            'extension'
        ];
    }

    public function service(): HasOne
    {
        return $this->hasOne(Service::class);
    }

    public function news(): HasOne
    {
        return $this->hasOne(News::class);
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }
}
