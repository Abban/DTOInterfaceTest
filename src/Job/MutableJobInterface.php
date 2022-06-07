<?php

declare(strict_types=1);

namespace DTOInterfaceTest\Job;

interface MutableJobInterface extends JobInterface
{
    public function lock(): void;
    public function unlock(): void;
}