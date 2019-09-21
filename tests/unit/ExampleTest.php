<?php

use app\models\Person;
use Codeception\Test\Unit;

/**
 * Class ExampleTest класс с тестами codecept.
 * Запуск под Win из корня проекта:
 * vendor/bin/codecept.bat run unit ExampleTest
 */
class ExampleTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        Yii::error("message form testSomeFeature", __METHOD__);
        $person = Person::findOne(1);
        $this->assertTrue($person !== null);
    }
}
