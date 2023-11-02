<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'nama_customer',
        'email',
        'no_identitas',
        'nomor_telepon',
        'alamat',
        'nama_institusi',
        'password',
    ];

    //protected $guarded = ['id'];
}