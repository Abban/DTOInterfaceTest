<?php

declare(strict_types=1);

namespace DTOInterfaceTest\UseCases;

use DTOInterfaceTest\Job\JobInterface;

class GetJobUseCase
{
    private \JobsRepository $repository;

    public function __construct(\JobsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getJobById(string $id): JobInterface {
        return $this->repository->getJobById($id);
    }
}
