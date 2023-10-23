<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'nama_season',
        'tanggal_mulai',
        'tanggal_berakhir'
    ];

    //protected $guarded = ['id'];

    public function tarifs()
    {
        return $this->hasMany(Tarif::class, 'tarif_id');
    }
}