<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use Yii;
use yii\base\Event;

/**
 * Class ForOwnerTicketVipHandler обрабатывает событие Для купивших билет VIP.
 * @package App\Event\Handler
 */
class ForOwnerTicketVipHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_FOR_OWNER_TICKET_VIP;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        Yii::info('Для купивших билет VIP');
    }
}
