<?php

namespace app\controllers\console;

use app\App\Event\EventList;
use app\models\Person;
use yii\console\Controller;

/**
 * Class EventController контролирует события.
 * @package app\controllers\console
 */
class EventController extends Controller
{
    /**
     * Возбуждает событие.
     * @param $eventName string имя события.
     * @return int статус.
     */
    public function actionTrigger($eventName)
    {
        $person = new Person();
        $person->id = 0;
        $person->username = '';
        $status = 0;
        switch ($eventName) {
            case EventList::EVENT_FOR_OWNER_TICKET_BUSINESS:
                $person->trigger(EventList::EVENT_FOR_OWNER_TICKET_BUSINESS);
                break;
            default:
                $status = 1;
        }
        return $status;
    }
}