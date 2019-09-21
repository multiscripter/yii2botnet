<?php

namespace app\App\Event\Handler;

use app\App\Event\EventList;
use app\models\Person;
use Yii;
use yii\base\Event;

require_once \yii\BaseYii::getAlias('@app').DIRECTORY_SEPARATOR
        .'/App/functions.php';

/**
 * Class ForOwnerTicketBusinessHandler обрабатывает событие Для купивших
 * билет BUSINESS.
 * @package App\Event\Handler
 */
class ForOwnerTicketBusinessHandler implements IHandler
{
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent()
    {
        return EventList::EVENT_FOR_OWNER_TICKET_BUSINESS;
    }

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event)
    {
        /** @var Person $user */
        $user = $event->sender;
        dump2log($user->username, 'debug.log');
        // Пишет в /runtime/debug/*.data.
        Yii::debug($user->username.'_debug2');
        // Пишет в /runtime/debug/*.data.
        Yii::info($user->username.'_info2');
        // Пишет в /runtime/debug/*.data и /runtime/logs/app.log.
        Yii::warning($user->username.'_warning2');
        // Пишет в /runtime/debug/*.data и /runtime/logs/app.log.
        Yii::error($user->username.'_error2');
    }
}
