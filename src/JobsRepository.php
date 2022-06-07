<?php

declare(strict_types=1);

use DTOInterfaceTest\Job\MutableJobInterface;

class JobsRepository
{
    /**
     * @var MutableJobInterface[]
     */
    private array $jobs;

    /**
     * @param MutableJobInterface[] $jobs
     */
    public function __construct(array $jobs)
    {
        $this->jobs = $jobs;
    }

    public function getJobById(string $id): MutableJobInterface {
        $filteredJobs = array_filter($this->jobs, fn($job) => $job->getId() == $id);
        return array_values($filteredJobs)[0];
    }
}
