<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $fillable = ['district_name'];

    public function destination()
    {
        return $this->hasMany(Destination::class, 'district_id', 'id');
    }
}
