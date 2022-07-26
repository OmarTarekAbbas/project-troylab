<?php

namespace App\Modules\Students\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Students\Repositories\StudentsRepository;
use App\Modules\Students\Services\StudentsService;
use App\Modules\Students\Resources\StudentsResource as Resource;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * The function __construct() is a magic method that is called when a new object is created. It is
     * used to initialize the object's properties
     *
     * @param StudentsRepository studentsRepository This is the repository that will be used to access
     * the database.
     * @param StudentsService studentsService This is the service class that will be used to perform the
     * business logic.
     */
    public function __construct(StudentsRepository $studentsRepository, StudentsService $studentsService)
    {
        $this->repository  = $studentsRepository;
        $this->service  = $studentsService;
    }
    /**
     * It returns a collection of all the Students in the database
     *
     * @param Request request This is the request object that is sent to the API.
     *
     * @return A collection of all the Students in the database.
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
        $getStudent = $this->repository->get($id);

        if (!$getStudent) {
            return $this->service->notFound();
        }
        return $this->service->success($getStudent);
    }
}
