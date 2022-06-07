<?php

declare(strict_types=1);

namespace DTOInterfaceTest\Job;

interface JobInterface
{
    public function getId(): string;
    public function getName(): string;
    public function getLockState(): LockStates;
}