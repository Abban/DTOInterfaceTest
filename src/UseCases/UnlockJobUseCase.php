<?php

declare(strict_types=1);

namespace DTOInterfaceTest\UseCases;

class UnlockJobUseCase
{
    private \JobsRepository $repository;

    public function __construct(\JobsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function unlockJob(string $jobId): void {
        ($this->repository->getJobById($jobId))->unlock();
    }
}
