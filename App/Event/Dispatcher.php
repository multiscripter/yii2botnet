<?php

namespace app\App\Event;

use app\App\Event\Handler\ForOwnerTicketBusinessHandler;
use app\App\Event\Handler\ForOwnerTicketPrePartyHandler;
use app\App\Event\Handler\ForOwnerTicketStandardHandler;
use app\App\Event\Handler\ForOwnerTicketVipHandler;
use app\App\Event\Handler\MassMailingOfferHandler;
use app\App\Event\Handler\OneDayTillPriceRiseHandler;
use app\App\Event\Handler\PaymentExpiredHandler;
use app\App\Event\Handler\PurchaseTicketHandler;
use app\App\Event\Handler\PurchaseTicketBusinessHandler;
use app\App\Event\Handler\PurchaseTicketPrepartyHandler;
use app\App\Event\Handler\PurchaseTicketStandardHandler;
use app\App\Event\Handler\PurchaseTicketVipHandler;
use app\App\Event\Handler\RequestCallbackHandler;
use app\App\Event\Handler\RequestPasswordHandler;
use app\App\Event\Handler\ResetPasswordHandler;
use app\App\Event\Handler\TicketNotBoughtAfterHalfMin;
use app\App\Event\Handler\UserCloseDuringEnteringHandler;
use app\App\Event\Handler\UserRegisteredHandler;
use app\App\Event\Handler\UserTryToCloseTabHandler;
use app\models\Person;
use yii\base\Component;
use yii\base\Event;

/**
 * Class Dispatcher реализует сущность Диспетчер событий.
 * @package App\Event
 */
class Dispatcher extends Component {
    /**
     * Присоединяет обработчики к событиям.
     */
    public function init() {
        parent::init();
        Event::on(Person::class,
            EventList::EVENT_FOR_OWNER_TICKET_BUSINESS,
            [new ForOwnerTicketBusinessHandler(), 'handle']
        );

        /*Event::on(Person::class,
            EventList::EVENT_FOR_OWNER_TICKET_PRE_PARTY,
            [new ForOwnerTicketPrePartyHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_FOR_OWNER_TICKET_STANDARD,
            [new ForOwnerTicketStandardHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_FOR_OWNER_TICKET_VIP,
            [new ForOwnerTicketVipHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_ONE_DAY_TILL_PRICE_RISE,
            [new OneDayTillPriceRiseHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_MASS_MAILING_OFFER,
            [new MassMailingOfferHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_PAYMENT_EXPIRED,
            [new PaymentExpiredHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_PURCHASE_TICKET,
            [new PurchaseTicketHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_PURCHASE_TICKET_BUSINESS,
            [new PurchaseTicketBusinessHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_PURCHASE_TICKET_PRE_PARTY,
            [new PurchaseTicketPrepartyHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_PURCHASE_TICKET_STANDARD,
            [new PurchaseTicketStandardHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_PURCHASE_TICKET_VIP,
            [new PurchaseTicketVipHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_REQUEST_CALLBACK,
            [new RequestCallbackHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_REQUEST_PASSWORD,
            [new RequestPasswordHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_RESET_PASSWORD,
            [new ResetPasswordHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_TICKET_NOT_BOUGHT_30SEC,
            [new TicketNotBoughtAfterHalfMin(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_USER_CLOSE_DURING_ENTERING,
            [new UserCloseDuringEnteringHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_USER_REGISTERED,
            [new UserRegisteredHandler(), 'handle']
        );

        Event::on(Person::class,
            EventList::EVENT_USER_TRY_TO_CLOSE_TAB,
            [new UserTryToCloseTabHandler(), 'handle']
        );*/
    }
}
