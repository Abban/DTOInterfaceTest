<?php

declare(strict_types=1);

namespace DTOInterfaceTest\Job;

class Job implements MutableJobInterface
{
    private string $id;
    private string $name;
    private LockStates $lockState;

    public function __construct(
        string $id,
        string $name,
        LockStates $lockState = LockStates::Locked)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lockState = $lockState;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLockState(): LockStates
    {
        return $this->lockState;
    }

    public function lock(): void
    {
        $this->lockState = LockStates::Locked;
    }

    public function unlock(): void
    {
        $this->lockState = LockStates::Unlocked;
    }
}
