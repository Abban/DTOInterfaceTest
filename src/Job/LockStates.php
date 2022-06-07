<?php

declare(strict_types=1);

namespace DTOInterfaceTest\Job;

enum LockStates
{
    case Locked;
    case Unlocked;
}
