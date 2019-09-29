<?php

namespace app\controllers\console;

use app\App\Event\EventList;
use app\models\Person;
use yii\console\Controller;

/**
 * Class EventController контролирует события, возбуждаемые обращением в консоли.
 * @package app\controllers\console
 */
class EventController extends Controller
{
    /**
     * Возбуждает указанное событие.
     * @param $eventName string значение константы события.
     * @return int статус.
     */
    public function actionTrigger($eventName)
    {
        $person = new Person();
        $person->id = 0;
        $person->firstname = '';
        $status = 0;
        switch ($eventName) {
            case EventList::FOR_OWNER_TICKET_BUSINESS:
                $person->trigger(EventList::FOR_OWNER_TICKET_BUSINESS);
                break;
            default:
                $status = 1;
        }
        return $status;
    }
}
