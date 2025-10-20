<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use Filterable;

    protected $table    = 'services';
    protected $with     = [
        'file'
    ];
    protected $fillable = [
        'name',  
        'icon',
        'status',
        'image_id',
        'description',
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [
            'name',
            'description'
        ];
    }

    public function file(): belongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }
}
