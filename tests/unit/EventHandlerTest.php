<?php
include __DIR__.'/../../App/functions.php';

use app\App\Event\EventList;
use app\models\Person;
use Codeception\Test\Unit;
use yii\base\Event;

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
        dump2log('testTestingCustomEventHandlers', 'common.log');
        $cls = new ReflectionClass(EventList::class);
        $events = $cls->getConstants();
        $messages = [];
        foreach ($events as $eventConst) {
            $person = new Person();
            $message = time();
            $message .= '-'.$eventConst;
            $person->username = $message;
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
}
