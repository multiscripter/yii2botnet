<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use yii\base\Event;

/**
 * Class PurchaseTicketPrepartyHandler обрабатывает событие "Юзер купил билет PRE-PARTY".
 * @package App\Event\Handler
 */
class PurchaseTicketPrepartyHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_PURCHASE_TICKET_PRE_PARTY;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        //Yii::info('Пользователь '.$user->name .' купил билет PRE-PARTY.');
    }
}
