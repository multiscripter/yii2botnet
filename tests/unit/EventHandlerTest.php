<?php
include __DIR__.'/../../App/functions.php';

use app\App\Event\EventList;
use app\App\Event\Handler\ForOwnerTicketBusinessHandler;
use app\App\Event\Handler\MailEventHandler;
use app\App\Event\Handler\RestEventHandler;
use app\models\Person;
use Codeception\Test\Unit;
use yii\base\Event;

/**
 * Class EventHandlerTest тестирует EventHandler.
 * Запуск под Win из корня проекта:
 * vendor/bin/codecept.bat run unit EventHandlerTest
 * Запуск под Linux из корня проекта:
 * php vendor/bin/codecept run unit EventHandlerTest
 */
class EventHandlerTest extends Unit
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

    /**
     * Метод с тестом должен быть один и в нём много assertion-вызовов.
     * Тестирует события app\App\Event\Handler.
     */
    public function testTestingCustomEventHandlers()
    {
        $cls = new ReflectionClass(EventList::class);
        $events = $cls->getConstants();
        $messages = [];
        foreach ($events as $eventConst) {
            $person = new Person();
            $message = time();
            $message .= '-'.$eventConst;
            $person->firstname = $message;
            $person->lastname = 'FakeLastName';
            $event = new Event([
                'name' => $eventConst,
                'sender' => $person
            ]);
            $messages[] = $message;
            $person->trigger($eventConst, $event);
        }

        $log = Yii::$app->getLog();
        $logFile = file_get_contents($log->targets[0]->logFile);
        foreach ($messages as $message) {
            $this->assertTrue(preg_match("/$message/", $logFile) === 1);
        }
    }

    /**
     * Тестирует метод function getEvent().
     */
    public function testGetEventReturnsEventConstantValue() {
        $eventName = (new ForOwnerTicketBusinessHandler())->getEvent();
        $this->assertEquals(EventList::FOR_OWNER_TICKET_BUSINESS, $eventName);
        $eventName = (new MailEventHandler())->getEvent();
        $this->assertEquals(EventList::MAIL, $eventName);
        $eventName = (new RestEventHandler())->getEvent();
        $this->assertEquals(EventList::REST, $eventName);
    }
}
