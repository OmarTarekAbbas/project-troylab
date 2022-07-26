<?php

namespace App\Modules\Schools\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Schools\Repositories\SchoolsRepository;
use App\Modules\Schools\Services\SchoolsService;
use App\Modules\Schools\Resources\SchoolsResource as Resource;

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
}
