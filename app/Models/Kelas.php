<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BiodataController;

class Kelas extends Model
{
    protected $table="kelas";
    protected $guarded=[
        "id"
    ];
    use HasFactory;
    
    public function scopeFilter($query, array $filters){
        $query->when($filters["biodata"] ?? false, function($query, $biodata){
            return $query->whereHas("biodata", function($query) use($biodata){
               return $query->where("nama", "like", "%" . $biodata . "%")
                            ->orWhere("NIS", "like", "%" . $biodata . "%");
            });
        });
    }

    public function biodata(){
        return $this->hasMany(Biodata::class);
    }


    }

