<?php

declare(strict_types=1);

namespace DTOInterfaceTest\UseCases;

use DTOInterfaceTest\Job\Job;
use DTOInterfaceTest\Job\LockStates;
use PHPUnit\Framework\TestCase;

class GetJobUseCaseTest extends TestCase
{
    public function testOnUnlockJob_jobReferenceIsUpdated(): void
    {
        $jobs = $this->givenJobs();
        $repository = new \JobsRepository($jobs);
        $getJobUseCase = new GetJobUseCase($repository);
        $unlockJobUseCase = new UnlockJobUseCase($repository);

        $job = $getJobUseCase->getJobById('2');

        $this->assertEquals(LockStates::Locked, $job->getLockState());

        $unlockJobUseCase->unlockJob('2');

        $this->assertEquals(LockStates::Unlocked, $job->getLockState());
    }

    public function testOnGetJobById_returnsJobInterface(): void
    {
        $jobs = $this->givenJobs();
        $repository = new \JobsRepository($jobs);
        $useCase = new GetJobUseCase($repository);

        $this->expectException(\Error::class);
        $useCase->getJobById('2')->unlock();
    }

    /**
     * @return Job[]
     */
    private function givenJobs(): array
    {
        return [
            new Job('1', 'Job 01'),
            new Job('2', 'Job 02'),
            new Job('3', 'Job 03'),
            new Job('4', 'Job 04'),
        ];
    }
}
