<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use Yii;
use yii\base\Event;

/**
 * Class OneDayTillPriceRiseHandler обрабатывает событие 24 часа до роста цен.
 * @package App\Event\Handler
 */
class OneDayTillPriceRiseHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_ONE_DAY_TILL_PRICE_RISE;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        Yii::info('Цены на сайте поднимаются через 24 часа');
    }
}
