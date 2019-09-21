<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use Yii;
use yii\base\Event;

require_once \yii\BaseYii::getAlias('@app').DIRECTORY_SEPARATOR
        .'/App/functions.php';

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
        dump2log($user->username, 'debug.log');
        Yii::info('Пользователь '.$user->username .' инициировал сброс пароля');
    }
}
