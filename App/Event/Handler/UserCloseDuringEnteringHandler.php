<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use yii\base\Event;

/**
 * Class UserCloseDuringEnteringHandler обрабатывает событие Пользователь
 * закрыл форму во время ввода данных.
 * @package App\Event\Handler
 */
class UserCloseDuringEnteringHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_USER_CLOSE_DURING_ENTERING;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        //Yii::info('Пользователь закрыл форму во время ввода данных');
    }
}
