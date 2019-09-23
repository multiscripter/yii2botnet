<?php

//use app\App\Event\EventList;
//use app\models\Person;
use Codeception\Test\Unit;
//use yii\base\Event;

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

    // Тестирует кастомные события.
    public function testTestsCustomEvents()
    {
        //Yii::error("message form testSomeFeature", __METHOD__);
        //$person = Person::findOne(1);
        //$this->assertTrue($person !== null);

        /*$cls = new ReflectionClass(EventList::class);
        $events = $cls->getConstants();
        $messages = [];
        foreach ($events as $eventConst) {
            $person = new Person();
            $message = time();
            $message .= '-'.$eventConst;
            $person->name = $message;
            $event = new Event([
                'name' => $eventConst,
                'sender' => $person
            ]);
            $messages[] = $message;
            $person->trigger($eventConst, $event);
        }*/

        /*$log = Yii::$app->getLog();
        $logFile = file_get_contents($log->targets[0]->logFile);
        foreach ($messages as $message) {
            $this->assertTrue(preg_match("/$message/", $logFile) === 1);
        }*/
    }
}
