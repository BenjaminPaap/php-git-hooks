<?php

namespace Module\Configuration\Tests\Stub;

use Module\Configuration\Domain\PhpCsStandard;
use Module\Tests\Infrastructure\Stub\RandomStubInterface;

class PhpCsStandardStub implements RandomStubInterface
{
    /**
     * @param $value
     *
     * @return PhpCsStandard
     */
    public static function create($value)
    {
        return new PhpCsStandard($value);
    }

    /**
     * @return PhpCsStandard
     */
    public static function random()
    {
        $standards = ['PSR1', 'PSR2', 'PHPCS', 'MySource', 'Zend', 'Squiz', 'PEAR'];

        return self::create($standards[array_rand($standards)]);
    }
}
