<?php

namespace app\controllers\console;

use app\App\Event\EventList;
use app\models\Person;
use yii\console\Controller;
use yii\db\Query;

/**
 * Class MailController контролирует рассылку писем.
 * @package app\controllers\console
 */
class MailController extends Controller
{
    /**
     * Отправляет письма пользоваетлям.
     * @param $ticketTypes string типы билетов.
     * @param $mode string include|exclude включая|исключая указанные типы.
     * По умолчанию только указанные типы.
     * @return int статус. 0 - успех. Любой другой - ошибка.
     */
    public function actionSend($ticketTypes, $mode = '')
    {
        $types = [0 => 1, 1 => 2, 2 => 3, 3 => 4];
        $ticketTypes = explode(',', $ticketTypes);
        $query = (new Query())
            ->select(['user_id'])
            ->from('ticket');
        for ($a = 0; $a < count($types); $a++) {
            $subQuery = (new Query())
                ->select('user_id')
                ->from('ticket')
                ->where(['type' => $types[$a]]);
            $params = [
                in_array($types[$a], $ticketTypes) ? 'in' : 'not in',
                'user_id',
                $subQuery
            ];
            if (in_array($mode, ['include', 'exclude'])) {
                if (!in_array($types[$a], $ticketTypes)) {
                    continue;
                } else {
                    if ($mode == 'include') {
                        $params[0] = 'in';
                    } else if ($mode == 'exclude') {
                        $params[0] = 'not in';
                    }
                }
            }
            if ($a == 0) {
                $query->where($params);
            } else {
                $query->andWhere($params);
            }
        }
        $userIds = $query->groupBy('user_id')
            ->all();
        $users = [];
        if ($userIds) {
            $ids = [];
            foreach ($userIds as $userId) {
                $ids[] = $userId['user_id'];
            }
            if ($ids) {
                $users = Person::findAll($ids);
            }
        }
        if ($users) {
            foreach ($users as $user) {
                $user->trigger(EventList::MAIL);
            }
        }
        return 0;
    }
}