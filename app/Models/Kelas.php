<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BiodataController;

class Kelas extends Model
{
    use HasFactory;
    protected $table="kelas";
    protected $guarded=[
        "id"
    ];
    protected $fillable=[
        "kelas",
        "wali_kelas"
    ];
    
    public function biodata(){
        return $this->hasMany(Biodata::class);
    }
}

