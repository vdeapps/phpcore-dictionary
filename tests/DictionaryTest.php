<?php

namespace Tests\vdeApps\phpCore\Dictionary;

use PHP_CodeSniffer\Standards\Squiz\Sniffs\Commenting\DocCommentAlignmentSniff;
use PHPUnit\Framework\TestCase;
use vdeApps\phpCore\Dictionary\Dictionary;

class DictionaryTest extends TestCase
{

    public function testConstruct()
    {

        $this->assertInstanceOf(
            Dictionary::class,
            new Dictionary()
        );
    }

}