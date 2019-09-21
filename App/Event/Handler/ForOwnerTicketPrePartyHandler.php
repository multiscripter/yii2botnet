<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use Yii;
use yii\base\Event;

/**
 * Class ForOwnerTicketPrePartyHandler обрабатывает событие Для купивших билет PRE-PARTY.
 * @package App\Event\Handler
 */
class ForOwnerTicketPrePartyHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_FOR_OWNER_TICKET_PRE_PARTY;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        Yii::info('Для купивших билет PRE-PARTY');
    }
}
