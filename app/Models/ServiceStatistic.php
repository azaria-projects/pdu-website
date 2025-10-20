<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class ServiceStatistic extends Model
{
    use Filterable;

    protected $table    = 'service_statistics';
    protected $fillable = [
        'icon',
        'value', 
        'status',
        'description', 
        'service_id'
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [
            'value', 
            'description',
        ];
    }
}
