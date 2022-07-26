<?php

namespace App\Modules\Students\Services;


use App\Http\Services\Services;
use App\Modules\Students\Repositories\StudentsRepository;


class StudentsService extends Services
{
    /**
     * Main Repository
     *
     * @var StudentsRepository
     */
    protected ?StudentsRepository $repository;

    /**
     * Constructor

     * @param StudentsRepository $repository
     */
    public function __construct(StudentsRepository $repository)
    {
        $this->repository = $repository;
    }
}
