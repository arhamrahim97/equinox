<?php

namespace App\Models;

use App\Models\Pengusul;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Moa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'moa';
    protected $guarded = ['id'];

    public function pengusul()
    {
        return $this->belongsTo(Pengusul::class);
    }

    public function mou()
    {
        return $this->belongsTo(Mou::class);
    }

}