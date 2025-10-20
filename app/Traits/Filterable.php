<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public static function filter(array $fil)
    {
        $qry = static::query();
        $pge = $fil['page'] ?? 1;
        $lim = $fil['limit'] ?? 15;
        $odr = $fil['order'] ?? 'asc';
        $key = $fil['keyword'] ?? null;
        $ord = $fil['order_by'] ?? 'id';
        $cls = method_exists(static::class, 'searchable') ? static::searchable() : [];
        
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
