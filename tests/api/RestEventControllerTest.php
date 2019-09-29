<?php

use app\App\Event\EventList;
use Codeception\Module;
use Codeception\Test\Unit;

/**
 * Class EventControllerTest тестирует EventController.
 * https://codeception.com/docs/10-APITesting#REST-API
 * https://codeception.com/docs/modules/REST
 * Запуск под Win из корня проекта:
 * vendor/bin/codecept.bat run api RestEventControllerTest
 * Запуск под Linux из корня проекта:
 * php vendor/bin/codecept run api RestEventControllerTest
 */
class RestEventControllerTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     * @var Module
     */
    private $module;

    /**
     * Выполняется перед каждым тестом.
     * @throws \Codeception\Exception\ModuleException
     */
    protected function _before()
    {
        //$data = $this->getMetadata()->getCurrent('modules');
        $this->module = $this->getModule('REST');
        //$this->module->haveHttpHeader('Host', 'api.cpa.localhost');
    }

    /**
     * Тестирует public function actionTrigger($name).
     * Принимает имя события EventList::REST.
     */
    public function testTriggerTakesExistentEventName()
    {
        $uri = '/event/trigger/';
        $uri .= EventList::REST.'/';
        $this->module->sendGET($uri);
        $this->module->seeResponseContains('{"success":true}');
        //$response = $this->module->grabResponse();
    }
}