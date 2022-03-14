<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'slider';
    protected $appends = ['urlFoto'];

    public function getUrlFotoAttribute()
    {
        return url(Storage::url('upload/slider/' . $this->foto));
    }
}
