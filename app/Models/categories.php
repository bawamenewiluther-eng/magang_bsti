<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function books()
{
    return $this->hasMany(Books::class);
}
}
