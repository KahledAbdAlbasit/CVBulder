<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $guarded = [];

    // rlationship between education and level one to one
    public function education()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }
}
