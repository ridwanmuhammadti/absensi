<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use Uuid;

    public function pegawai()
    {
        return $this->HasMany(Pegawai::class);
    }
}
