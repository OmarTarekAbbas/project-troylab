<?php

namespace App\Modules\Students\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /* Telling Laravel that the table name is students. */
    protected $table = 'students';

    /* Telling Laravel that the only field that can be filled in the database is the name field. */
    protected $fillable = [
        'name','school_id','order'
    ];

    /**
     * > This function returns the school that the user belongs to
     *
     * @return A collection of all the schools that have the same id as the school_id of the current
     * user.
     */
    public function School()
    {
        return $this->belongsTo('App\Modules\Schools\Models\School', 'school_id', 'id');
    }
}
