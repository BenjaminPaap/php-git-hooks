<?php

namespace Module\Configuration\Tests\Stub;

use Module\Configuration\Domain\Level;
use Module\Configuration\Domain\PhpCsFixerLevels;
use Module\Tests\Infrastructure\Stub\RandomStubInterface;

class PhpCsFixerLevelsStub implements RandomStubInterface
{
    /**
     * @param Level $psr0
     * @param Level $psr1
     * @param Level $psr2
     * @param Level $symfony
     *
     * @return PhpCsFixerLevels
     */
    public static function create(Level $psr0, Level $psr1, Level $psr2, Level $symfony)
    {
        return new PhpCsFixerLevels($psr0, $psr1, $psr2, $symfony);
    }

    /**
     * @return PhpCsFixerLevels
     */
    public static function random()
    {
        return self::create(LevelStub::random(), LevelStub::random(), LevelStub::random(), LevelStub::random());
    }
}
