<?php

namespace app\App\Event;

use app\App\Event\Handler\ForOwnerTicketBusinessHandler;
use app\App\Event\Handler\RestEventHandler;
use app\models\Person;
use yii\base\Component;
use yii\base\Event;

/**
 * Class Dispatcher реализует сущность Диспетчер событий.
 * @package App\Event
 */
class Dispatcher extends Component
{
    /**
     * Присоединяет обработчики к событиям.
     */
    public function init()
    {
        parent::init();
        Event::on(Person::class,
            EventList::EVENT_FOR_OWNER_TICKET_BUSINESS,
            [new ForOwnerTicketBusinessHandler(), 'handle']
        );
        Event::on(Person::class,
            EventList::EVENT_REST,
            [new RestEventHandler(), 'handle']
        );
    }
}
