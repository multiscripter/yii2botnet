<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use yii\base\Event;

/**
 * Class ResetPasswordHandler обрабатывает событие сброса пароля.
 * @package App\Event\Handler
 */
class ResetPasswordHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_RESET_PASSWORD;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        //Yii::info('Пользователь '.$user->username .' инициировал сброспароля');
    }
}
