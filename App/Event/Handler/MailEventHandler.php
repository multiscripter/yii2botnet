<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use Yii;
use yii\base\Event;
use yii\log\Logger;

/**
 * Class MailEventHandler обрабатывает событие отправки писем.
 * @package App\Event\Handler
 */
class MailEventHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::MAIL;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        $message = $user->firstname;
        $message .= ' ' . $user->lastname;
        $message .= ' возбудил событие MAIL';
        Yii::$app->getLog()->logger->log($message, Logger::LEVEL_ERROR,'events');
    }
}