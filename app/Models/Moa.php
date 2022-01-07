<?php

namespace App\Models;

use App\Models\Mou;
use App\Models\User;
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

    // public function fakultas(){
    //     return $this->belongsTo(Fakultas::class);
    // }
    
    public function mou()
    {
        return $this->belongsTo(Mou::class)->withTrashed();
    }
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}