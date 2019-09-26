<?php

namespace app\controllers;

use app\App\Event\EventList;
use app\models\Person;
use yii\rest\Controller;

/**
 * Class EventController контролирует события, возбуждаемые обращением к rest-api.
 * @package app\controllers\rest
 */
class EventController extends Controller
{
    /**
     * Возбуждает указанное событие.
     * @param $name string значение константы события.
     * @return array ответ сервера.
     */
    public function actionTrigger($name)
    {
        $response = [
            'success' => true
        ];
        $person = new Person();
        $person->id = 0;
        $person->username = '';
        switch ($name) {
            case EventList::EVENT_REST:
                $person->trigger(EventList::EVENT_REST);
                break;
            default:
                $response['success'] = false;
        }
        return $response;
    }
}
