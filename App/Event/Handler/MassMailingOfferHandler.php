<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use yii\base\Event;

/**
 * Class MassMailingOfferHandler обрабатывает событие
 * Массовая рассылка предложений.
 * @package App\Event\Handler
 */
class MassMailingOfferHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_MASS_MAILING_OFFER;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        //Yii::info('Массовая рассылка предложений');
    }
}