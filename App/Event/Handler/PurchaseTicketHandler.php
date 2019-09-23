<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use App\Models\User;
use yii\base\Event;

/**
 * Class PurchaseTicketHandler обрабатывает событие "Юзер купил билет".
 * @package App\Event\Handler
 */
class PurchaseTicketHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_PURCHASE_TICKET;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var User $user */
        $user = $event->sender;
        //Yii::info('Пользователь '.$user->name .' купил билет.');
    }
}