<?php

namespace Module\Configuration\Service;

use Composer\IO\IOInterface;
use Module\Configuration\Domain\Enabled;
use Module\Configuration\Domain\PhpUnit;
use Module\Configuration\Domain\PhpUnitOptions;
use Module\Configuration\Domain\PhpUnitRandomMode;

class PhpUnitConfigurator
{
    /**
     * @param IOInterface $io
     * @param PhpUnit     $phpUnit
     *
     * @return PhpUnit
     */
    public static function configure(IOInterface $io, PhpUnit $phpUnit)
    {
        if (true === $phpUnit->isUndefined()) {
            $answer = $io->ask(HookQuestions::PHPUNIT_TOOL, HookQuestions::DEFAULT_TOOL_ANSWER);

            $phpUnit = $phpUnit->setEnabled(new Enabled(HookQuestions::DEFAULT_TOOL_ANSWER === strtoupper($answer)));

            if (true === $phpUnit->isEnabled()) {
                $randomAnswer = $io->ask(HookQuestions::PHPUNIT_RANDOM_MODE, HookQuestions::DEFAULT_TOOL_ANSWER);
                $optionsAnswer = $io->ask(HookQuestions::PHPUNIT_OPTIONS, null);

                $randomMode = new PhpUnitRandomMode(HookQuestions::DEFAULT_TOOL_ANSWER === strtoupper($randomAnswer));
                $options = new PhpUnitOptions($optionsAnswer);

                $phpUnit = $phpUnit->setRandomModeAndOptions($randomMode, $options);
            }
        }

        return $phpUnit;
    }
}
