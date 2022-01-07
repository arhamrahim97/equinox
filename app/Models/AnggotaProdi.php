<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AnggotaProdi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'anggota_prodi';
    protected $guarded = ['id'];

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }
}