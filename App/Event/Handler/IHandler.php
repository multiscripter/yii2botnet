<?php

namespace app\App\Event\Handler;

use yii\base\Event;

/**
 * Interface IHandler объявляет обработчик события.
 */
interface IHandler {
    /**
     * Получает константу события.
     * @return mixed константа события.
     */
    function getEvent();

    /**
     * Обрабатывает событие.
     * @param Event $event событие.
     */
    function handle(Event $event);
}
