<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengusul extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pengusul';
    protected $guarded = ['id'];

    public function negara()
    {
        return $this->belongsTo(Negara::class);
    }

    public function countNegara()
    {
        return $this->negara()->count();
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function mou()
    {
        return $this->hasMany(Mou::class);
    }

    public function moa()
    {
        return $this->hasMany(Moa::class);
    }

    public function ia()
    {
        return $this->hasMany(Ia::class);
    }
}
