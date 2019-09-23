<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use yii\base\Event;

/**
 * Class UserTryToCloseTabHandler обрабатывает событие Пользователь попытался закрыть вкладку.
 * @package App\Event\Handler
 */
class UserTryToCloseTabHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_USER_TRY_TO_CLOSE_TAB;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        //Yii::info('Пользователь попытался закрыть вкладку');
    }
}
