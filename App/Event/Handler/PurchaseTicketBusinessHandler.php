<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use App\Models\User;
use Yii;
use yii\base\Event;

/**
 * Class PurchaseTicketBusinessHandler обрабатывает событие "Юзер купил билет BUSINESS".
 * @package App\Event\Handler
 */
class PurchaseTicketBusinessHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_PURCHASE_TICKET_BUSINESS;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var User $user */
        $user = $event->sender;
        Yii::info('Пользователь '.$user->name .' купил билет BUSINESS.');
    }
}
