<?php

use app\App\Event\EventList;
use app\controllers\console\EventController;
use Codeception\Test\Unit;

/**
 * Class EventControllerTest тестирует EventController.
 * API модуля CLi https://codeception.com/docs/modules/Cli
 * Чтобы использовать модуль его нужно подключить в unit.suite.yml
 * Запуск под Win из корня проекта:
 * vendor/bin/codecept.bat run unit ConsoleEventControllerTest
 */
class ConsoleEventControllerTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $module;

    protected function _before()
    {
        // Получить массив всех зарегистрированных модулей.
        //$data = $this->getMetadata()->getCurrent('modules');
        /**
         * Получить модуль по имени, по которому модуль зарегистрирован в yml-файле.
         * Если модуль зарегистрирован по короткому имени (например 'CLi'),
         * то получить модуль можно вызовом:
         * $module = $this->getModule('CLi');
         * Если модуль зарегистрирован по имени с пространством имён
         * (например '\Codeception\Module\Cli')
         * то получить модуль можно вызовом:
         * $module = $this->getModule('\Codeception\Module\Cli');
         */
        $this->module = $this->getModule('CLi');
    }

    protected function _after()
    {
    }

    public function testConsoleCallOfTriggerReturnsZero()
    {
        $cmd = 'php yii event/trigger '.EventList::EVENT_FOR_OWNER_TICKET_BUSINESS;
        $this->module->runShellCommand($cmd);
        $this->module->seeResultCodeIs(0);
    }

    public function testExplicitCallOfTriggerReturnsZero()
    {
        $ctrl = new EventController('FakeId', $this->module);
        $actual = $ctrl->actionTrigger(EventList::EVENT_FOR_OWNER_TICKET_BUSINESS);
        $this->tester->assertEquals(0, $actual);
    }

    public function testConsoleCallOfTriggerWithoutArguments()
    {
        $cmd = 'php yii event/trigger ';
        $this->module->runShellCommand($cmd, false);
        $this->module->seeResultCodeIsNot(0);
    }

    public function testExplicitCallOfTriggerWithNonexistentArgument()
    {
        $ctrl = new EventController('FakeId', $this->module);
        $actual = $ctrl->actionTrigger('FakeEventConstantValue');
        $this->tester->assertEquals(1, $actual);
    }
}
