<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['district_bn','district_en'];
    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }

}
