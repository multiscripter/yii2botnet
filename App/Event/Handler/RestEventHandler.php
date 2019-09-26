<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use Yii;
use yii\base\Event;
use yii\log\Logger;

/**
 * Class ForOwnerTicketBusinessHandler обрабатывает событие Для купивших
 * билет BUSINESS.
 * @package App\Event\Handler
 */
class RestEventHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_REST;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        $message = $user->username.' возбудил событие REST';
        Yii::$app->getLog()->logger->log($message, Logger::LEVEL_ERROR,'events');
    }
}
