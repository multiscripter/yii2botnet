<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use Yii;
use yii\base\Event;

/**
 * Class RequestCallback обрабатывает событие Заказ звонка.
 * @package App\Event\Handler
 */
class RequestCallbackHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_REQUEST_CALLBACK;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        Yii::info('Пользователь '.$user->name .' заказал звонок.');
    }
}
