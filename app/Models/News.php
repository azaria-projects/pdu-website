<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use Filterable;

    protected $table    = 'news';
    protected $with     = [
        'file'
    ];
    protected $fillable = [
        'name', 
        'link',
        'status',
        'image_id',
        'description'
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
