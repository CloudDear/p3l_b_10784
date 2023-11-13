<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'tarif_terpasang',
        'season_id'
    ];

    //protected $guarded = ['id'];

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'season_id'); //bagian ini
    }

    public function kamars()
    {
        return $this->hasMany(Kamar::class, 'kamar_id');
    }
}