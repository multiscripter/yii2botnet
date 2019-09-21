<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use Yii;
use yii\base\Event;

/**
 * Class PaymentExpiredHandler обрабатывает событие Время, отведённое для оплаты, вышло.
 * @package App\Event\Handler
 */
class PaymentExpiredHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_PAYMENT_EXPIRED;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        Yii::info('Время, отведённое для оплаты, вышло');
    }
}
