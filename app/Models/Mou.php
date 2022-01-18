<?php

namespace App\Models;

use App\Models\Pengusul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Mou extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mou';
    protected $guarded = ['id'];

    public function pengusul()
    {
        return $this->belongsTo(Pengusul::class);
    }
}
