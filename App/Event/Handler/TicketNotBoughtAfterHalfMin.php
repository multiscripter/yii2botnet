<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use yii\base\Event;

/**
 * Class TicketNotBoughtAfterHalfMin обрабатывает событие Пользователь не купил
 * билет спустя 30 секунд нахождения на сайте.
 */
class TicketNotBoughtAfterHalfMin implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_TICKET_NOT_BOUGHT_30SEC;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        //Yii::info('Пользователь не купил билет спустя 30 секунд нахожденияна сайте.');
    }
}
