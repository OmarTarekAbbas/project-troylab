<?php

namespace App\Modules\Schools\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Schools\Repositories\SchoolsRepository;
use App\Modules\Schools\Services\SchoolsService;
use App\Modules\Schools\Resources\SchoolsResource as Resource;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    /**
     * The function __construct() is a magic method that is called when a new object is created. It is
     * used to initialize the object's properties
     *
     * @param SchoolsRepository schoolsRepository This is the repository that will be used to access
     * the database.
     * @param SchoolsService schoolsService This is the service class that will be used to perform the
     * business logic.
     */
    public function __construct(SchoolsRepository $schoolsRepository, SchoolsService $schoolsService)
    {
        $this->repository  = $schoolsRepository;
        $this->service  = $schoolsService;
    }

    /**
     * It returns a collection of all the schools in the database
     *
     * @param Request request This is the request object that is sent to the API.
     *
     * @return A collection of all the schools in the database.
     */
    public function index(Request $request)
    {
        return Resource::collection($this->repository->list());
    }

    /**
     * It validates the request, and if it passes, it creates a record in the database
     *
     * @param Request request The request object
     *
     * @return The create method is returning a success response with the record that was created.
     */
    public function store(Request $request)
    {
        $validator = $this->validatorStoreForm($request);

        if (!$validator->passes()) {
            return $this->service->badRequest($validator);
        }
        $createSchool = $this->repository->create($request);
        return $this->service->success($createSchool);
    }

    /**
     * > This function returns the result of the `get` function in the `repository` class
     *
     * @param Request request The request object
     * @param id The id of the resource to be retrieved.
     *
     * @return The repository is being called to get the id of the user.
     */
    public function show(Request $request, $id)
    {
        $getSchool = $this->repository->get($id);

        if (!$getSchool) {
            return $this->service->notFound();
        }
        return $this->service->success($getSchool);
    }

    /**
     * It updates a school with the given id
     *
     * @param id The id of the school you want to update.
     * @param Request request The request object.
     *
     * @return the result of the update function in the repository.
     */
    public function update($id, Request $request)
    {
        $validator = $this->validatorStoreForm($request);

        if (!$validator->passes()) {
            return $this->service->badRequest($validator);
        }
        if ($this->repository->get($id)) {
            $updateSchool = $this->repository->update($id, $request);
            return $this->service->success($updateSchool);
        }
        return $this->service->notFound();
    }

    /**
     * It deletes the record with the given id
     *
     * @param Request request The request object
     * @param id The id of the resource to be deleted.
     *
     * @return The response is being returned.
     */
    public function destroy($id, Request $request)
    {
        if ($this->repository->get($id)) {
            $this->repository->delete($id);
            return $this->service->success();
        }
        return $this->service->notFound();
    }

    /**
     * It validates the form data.
     *
     * @param request The request object
     *
     * @return A validator object.
     */
    public function validatorStoreForm($request)
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:1', 'max:255'],
        ]);
    }
}
