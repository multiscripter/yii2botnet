<?php

use app\App\Event\EventList;
use app\models\Person;
use Codeception\Test\Unit;
use yii\BaseYii;
use yii\base\Event;

class EventHandlerTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $file;

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
    public function testCustomTestingEventHandlers()
    {
        $user = new Person();
        $message1 = time();
        $eventName = EventList::EVENT_FOR_OWNER_TICKET_BUSINESS;
        $message1 .= '|'.$eventName;
        $user->username = $message1;
        $event = new Event([
            'name' => $eventName,
            'sender' => $user
        ]);
        $user->trigger($eventName, $event);

        $user = new Person();
        $message2 = time();
        $eventName = EventList::EVENT_RESET_PASSWORD;
        $message2 .= '|'.$eventName;
        $user->username = $message2;
        $event = new Event([
            'name' => $eventName,
            'sender' => $user
        ]);
        $user->trigger($eventName, $event);

        $path = BaseYii::getAlias('@app');
        $path .= BaseYii::getAlias('@logs');
        $path .= DIRECTORY_SEPARATOR.'debug.log';
        $this->file = file_get_contents($path);

        $this->assertTrue(preg_match("/$message1/", $this->file) === 1);
        $this->assertTrue(preg_match("/$message2/", $this->file) === 1);
    }
}
