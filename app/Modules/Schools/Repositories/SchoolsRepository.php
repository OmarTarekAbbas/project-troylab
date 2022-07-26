<?php

namespace App\Modules\Schools\Repositories;

use App\Modules\Schools\{
    Models\School as Model,
    Resources\SchoolsResource as Resource,
};

class SchoolsRepository
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
        $createSchool = Model::create([
            'name' => $request->name,
        ]);
        return new Resource(Model::findOrFail($createSchool->id));
    }

    /**
     * > This function returns a new SchoolsResource object, which is a collection of the data from the
     * Model::findOrFail() function
     *
     * @param id The id of the school you want to get.
     *
     * @return A new SchoolsResource object.
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
        Model::destroy($id);
    }

    /**
     * It updates the school name.
     *
     * @param id The id of the school you want to update
     * @param request The request object
     *
     * @return A new SchoolsResource object.
     */
    public function update($id, $request)
    {
        Model::where('id', $id)->update([
            'name' => $request->name,
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
}
