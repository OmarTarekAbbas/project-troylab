<?php

namespace App\Modules\Students\Repositories;

use App\Modules\Students\{
    Models\Student as Model,
    Resources\StudentsResource as Resource,
};

class StudentsRepository
{

    /**
     * {@inheritDoc}
     */
    const MODEL = Model::class;

    /**
     * {@inheritDoc}
     */
    const RESOURCE = Resource::class;

    /**
     * It creates a new model with the name from the request
     *
     * @param request The request object
     */
    public function create($request)
    {
        $createStudent = Model::create([
            'name' => $request->name,
            'school_id' => $request->school_id,
            'order' => $this->getCountStudentForSchool($request) + 1,
        ]);
        return new Resource(Model::findOrFail($createStudent->id));
    }

    /**
     * > This function returns a new StudentsResource object, which is a collection of the data from the
     * Model::findOrFail() function
     *
     * @param id The id of the Student you want to get.
     *
     * @return A new StudentsResource object.
     */
    public function get($id)
    {
        try {
            return new Resource(Model::findOrFail($id));
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * It deletes the data from the database.
     *
     * @param id The id of the model you want to delete.
     */
    public function delete($id)
    {
        $getStudentForSchool =  Model::findOrFail($id);
        $updateStudentForSchools =  Model::where('school_id', $getStudentForSchool->school_id);
        Model::destroy($id);
        /* Updating the order of the students in the school. */
        $this->updateStudentForSchools($updateStudentForSchools);
    }

    /**
     * It updates the Student name.
     *
     * @param id The id of the Student you want to update
     * @param request The request object
     *
     * @return A new StudentsResource object.
     */
    public function update($id, $request)
    {
        Model::where('id', $id)->update([
            'name' => $request->name,
            'school_id' => $request->school_id,
            'order' => $this->getCountStudentForSchool($request) + 1,
        ]);
        return new Resource(Model::findOrFail($id));
    }

    /**
     * > This function returns all the records in the database
     *
     * @return All the data in the table.
     */
    public function list()
    {
        return Model::all();
    }

    /**
     * > This function returns the number of students for a given school
     *
     * @param request The request object
     *
     * @return int The number of students in a school
     */
    public function getCountStudentForSchool($request): int
    {
        return Model::where('school_id', $request->school_id)->count();
    }

    /**
     * It takes a collection of objects, loops through them, and updates the order property of each
     * object to be the same as the index of the object in the collection
     *
     * @param updateStudentForSchools This is the collection of the model that you want to update.
     */
    public function updateStudentForSchools($updateStudentForSchools)
    {
        foreach ($updateStudentForSchools->get() as $key =>  $updateStudentForSchool) {
            $count = $key + 1;
            if ($count <= $updateStudentForSchool->count()) {
                $updateStudentForSchool->order = $count;
                $updateStudentForSchool->save();
            }
        }
    }
}
