<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Biodata extends Model
{
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
        "no_absen"
    ];
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
    $query->when($filters["search"] ?? false, function($query, $search){
         return $query->where("nama", "like", "%" . $search . "%")
                      ->orWhere("NIS", "like", "%" . $search . "%");
    }); 
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, "kelas_id");
    }
}
