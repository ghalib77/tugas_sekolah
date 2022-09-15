<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Biodata extends Model
{
    use HasFactory;
    protected $table="biodata";
    protected $guarded=[
        "id"
    ];
    protected $fillable=[
        "nama",
        "NIS",
        "kelas_id",
        "tanggal_lahir",
        "tempat_lahir",
        "email"
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, "kelas_id");
    }
}
