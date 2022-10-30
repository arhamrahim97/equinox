<?php

namespace App\Models;

use App\Models\Moa;
use App\Models\User;
use App\Models\Mou;
use App\Models\Pengusul;
use App\Models\AnggotaProdi;
use App\Models\AnggotaFakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Ia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ia';
    protected $guarded = ['id'];
    protected $appends = ['status'];

    public function pengusul()
    {
        return $this->belongsTo(Pengusul::class);
    }

    public function moa() // Tabel IA = moa_id
    {
        return $this->belongsTo(Moa::class);
        // ->withTrashed();
    }

    // public function mou(){
    //     return $this->belongsTo(Mou::class, 'id', moa()->mou_id);
    // }

    public function anggotaFakultas()
    {
        return $this->hasMany(AnggotaFakultas::class);
    }

    public function anggotaProdi()
    {
        return $this->hasMany(AnggotaProdi::class);
    }

    public function jenisKerjasama()
    {
        return $this->hasMany(JenisKerjasama::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function getStatusAttribute()
    {
        $datetime1 = date_create($this->tanggal_berakhir);
        $datetime2 = date_create(date("Y-m-d"));
        if ($datetime1 < $datetime2) {
            if (($this->laporan_hasil_pelaksanaan != '') || ($this->laporan_hasil_pelaksanaan != NULL)) {
                return __('components/span.selesai');
            } else {
                return __('components/span.melewati_batas');
            }
        } else {
            if (($this->laporan_hasil_pelaksanaan != '') || ($this->laporan_hasil_pelaksanaan != NULL)) {
                return __('components/span.selesai');
            } else {
                return  __('components/span.aktif');
            }
        }
    }
};
