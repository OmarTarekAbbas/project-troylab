<?php

namespace App\Modules\Schools\Services;


use App\Http\Services\Services;
use App\Modules\Schools\Repositories\SchoolsRepository;


class SchoolsService extends Services
{
    /**
     * Main Repository
     *
     * @var SchoolsRepository
     */
    protected ?SchoolsRepository $repository;

    /**
     * Constructor

     * @param SchoolsRepository $repository
     */
    public function __construct(SchoolsRepository $repository)
    {
        $this->repository = $repository;
    }
}
