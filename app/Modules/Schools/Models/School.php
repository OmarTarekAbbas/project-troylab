<?php

namespace App\Modules\Schools\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    /* Telling Laravel that the table name is schools. */
    protected $table = 'schools';

    /* Telling Laravel that the only field that can be filled in the database is the name field. */
    protected $fillable = [
        'name'
    ];

    /**
     * > This function returns all the students that belong to this school
     *
     * @return A collection of students that belong to the school.
     */
    public function students()
    {
        return $this->hasMany('App\Modules\Students\Models\Student', 'school_id', 'id');
    }
}
