<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use Yii;
use yii\base\Event;

/**
 * Class RequestPasswordHandler обрабатывает событие Запрос пароля.
 * @package App\Event\Handler
 */
class RequestPasswordHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_REQUEST_PASSWORD;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        dump2log($user->username, 'debug.log');
        Yii::info('Пользователь '.$user->name .' запросил смену пароля');
    }
}
