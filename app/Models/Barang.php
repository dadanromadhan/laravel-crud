<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('NamaBarang', 'like', '%' . $search . '%');
        });
    }

    protected $fillable = [
        'NamaBarang',
        'HargaBeli',
        'HargaJual',
        'FotoBarang',
        'Stok',
    ];
}
