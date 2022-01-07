<?php

namespace App\Models;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;
    use SoftDeletes;    
    protected $guarded = ['id'];
    protected $table = 'fakultas';

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}