<?php

namespace App\Modules\Schools\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{

    protected $table = 'schools';

    protected $fillable = [
        'name'
    ];
}
