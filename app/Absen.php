<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','tanggal','time_in','time_out','ket'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
