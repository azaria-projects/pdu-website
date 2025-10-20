<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use Filterable;

    protected $table    = 'statistics';
    protected $fillable = [ 
        'icon', 
        'value', 
        'status', 
        'description'
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [
            'value',
            'description'
        ];
    }
}
