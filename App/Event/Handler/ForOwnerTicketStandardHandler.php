<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use yii\base\Event;

/**
 * Class ForOwnerTicketStandardHandler обрабатывает событие Для купивших билет STANDARD.
 * @package App\Event\Handler
 */
class ForOwnerTicketStandardHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_FOR_OWNER_TICKET_STANDARD;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        //Yii::info('Для купивших билет STANDARD');
    }
}
