<?php

namespace Tests\vdeApps\phpCore\Dictionary;

use PHPUnit\Framework\TestCase;
use vdeApps\phpCore\Dictionary\Dictionary;

class DictionaryTest extends TestCase
{
    protected $badDic = "strBad";

    protected $dic = [
      'nom'=>'Name',
      'prenom'=>'First name',
      'pays' => 'Country',
    ];

    protected $appendDic=[
        'nom'=>'Name',
        'prenom'=>'First name',
        'pays' => 'Country',
        'AAAA'=>'aaaa',
        'BBBB'=>'bbbb',
    ];

    public function testConstruct()
    {

        $this->assertInstanceOf(
            Dictionary::class,
            new Dictionary()
        );

        $this->assertInstanceOf(
            Dictionary::class,
            Dictionary::getInstance()
        );

        $this->assertInstanceOf(
            Dictionary::class,
            Dictionary::getInstance($this->dic)
        );

        try{
            $o = Dictionary::getInstance($this->badDic);
        }
        catch (\Exception $ex){
            $this->assertEquals($ex->getCode(), 5);
        }
    }

    public function testCheck()
    {
        $o = Dictionary::getInstance($this->dic);

        $this->assertEquals($this->dic, $o->getDictionary());

        $this->assertEquals(array_keys($this->dic), $o->getKeys());

        $this->assertEquals([], $o->clear()->getDictionary());

        $o = Dictionary::getInstance($this->dic);

        $o->setString('AAAA', 'aaaa')
          ->setString('BBBB', 'bbbb');

        $this->assertNotEquals('AAAA', $o->getString('AAAA'));
        $this->assertEquals('aaaa', $o->getString('AAAA'));
        $this->assertEquals('bbbb', $o->getString('BBBB'));
        $this->assertEquals('Name', $o->getString('nom'));

        $this->assertEquals(false, $o->getString('Fake Key'));

        $o = Dictionary::getInstance($this->dic);
        $o->append([
            'AAAA'=>'aaaa',
            'BBBB'=>'bbbb',
        ]);

        $this->assertEquals($this->appendDic, $o->getDictionary());

        print_r($o->getDictionary());
    }
}