<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use yii\base\Event;

/**
 * Class UserRegisteredHandler обрабатывает событие Пользователь зарегистрировался.
 * @package App\Event\Handler
 */
class UserRegisteredHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_USER_REGISTERED;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        //Yii::info('Пользователь '.$user->name .' зарегистрировался');
    }
}