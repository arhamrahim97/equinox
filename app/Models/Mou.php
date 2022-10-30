<?php

namespace App\Models;

use App\Models\Pengusul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Mou extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mou';
    protected $guarded = ['id'];
    protected $appends = ['status', 'linkDokumen'];

    public function pengusul()
    {
        return $this->belongsTo(Pengusul::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id')->withTrashed();
    }

    public function moa()
    {
        return $this->hasMany(Moa::class);
    }

    public function getStatusAttribute()
    {
        $datetime1 = date_create($this->tanggal_berakhir);
        $datetime2 = date_create(date("Y-m-d"));
        $interval = date_diff($datetime1, $datetime2);
        $jumlah_tahun =  $interval->format('%y');
        if ($datetime1 < $datetime2) {
            return  __('components/span.kadaluarsa');
        } else {
            if ($jumlah_tahun < 1) {
                return  __('components/span.masa_tenggang');
            } else {
                return  __('components/span.aktif');
            }
        }
    }

    public function getLinkDokumenAttribute()
    {
        return url(Storage::url("dokumen/mou/" . $this->dokumen));
    }
}
