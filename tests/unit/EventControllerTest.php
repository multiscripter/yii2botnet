<?php

use app\App\Event\EventList;
use app\controllers\console\EventController;
use Codeception\Test\Unit;

/**
 * Class EventControllerTest тестирует EventController.
 * API модуля CLi https://codeception.com/docs/modules/Cli
 * Чтобы использовать модуль его нужно подключить в unit.suite.yml
 */
class EventControllerTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $module;

    protected function _before()
    {
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
