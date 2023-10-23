<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'jenis_kamar',
        'tipe_tempat_tidur',
        'tarif_awal',
        'ukuran_kamar',
        'kapasitas_kamar',
        'rincian_kamar',
        'detail_kamar',
    ];

    //protected $guarded = ['id'];

    public function tarifs()
    {
        return $this->hasMany(Tarif::class);
    }
}