<?php

namespace App\Models;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AnggotaFakultas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'anggota_fakultas';
    protected $guarded = ['id'];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }
}