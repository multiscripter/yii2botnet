<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use yii\base\Event;

/**
 * Class PurchaseTicketStandardHandler обрабатывает событие "Юзер купил билет STANDARD".
 * @package App\Event\Handler
 */
class PurchaseTicketStandardHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_PURCHASE_TICKET_STANDARD;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        //Yii::info('Пользователь '.$user->name .' купил билет STANDARD.');
    }
}
