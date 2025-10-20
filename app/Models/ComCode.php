<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ComCode extends Model
{
    use Filterable;

    protected $table    = 'com_codes';
    protected $fillable = [
        'name',  
        'value',
    ];

    public static function boot() 
    {
        parent::boot();
    }

    public static function searchable(): array
    {
        return [ 'name', 'value' ];
    }

    public static function filter(array $fil)
    {
        $qry = static::query();
        $pge = $fil['page'] ?? 1;
        $lim = $fil['limit'] ?? 15;
        $odr = $fil['order'] ?? 'asc';
        $key = $fil['keyword'] ?? null;
        $typ = $fil['type'] ?? null;
        $ord = $fil['order_by'] ?? 'id';

        $cls = method_exists(static::class, 'searchable') ? static::searchable() : [];

        if ($typ) {
            $qry->where('type', $typ);
        }
        
        if ($key) {
            $qry->where(function (Builder $bld) use ($cls, $key) {
                foreach ($cls as $col) {
                    $bld->orWhere($col, 'like', "%$key%");
                }
            });
        }
        
        return $qry->orderBy($ord, $odr)->paginate($lim);
    }
}
