<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $appends = ['urlFotoSampul'];

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class)->withTrashed();
    }

    public function scopeCari($query, $request)
    {
        if ($request['cari']) {
            $query->where(function ($query) use ($request) {
                $query->where('judul', 'like', '%' . $request['cari'] . '%')
                    ->orWhere('konten', 'like', '%' . $request['cari'] . '%');
            });
        }

        if ($request['kategori']) {
            $query->where('kategori_berita_id', $request['kategori']);
        }

        return $query;
    }

    public function getUrlFotoSampulAttribute()
    {
        return url(Storage::url('upload/sampul_berita/' . $this->foto_sampul));
    }
}
