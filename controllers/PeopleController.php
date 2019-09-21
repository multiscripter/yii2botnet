<?php
namespace app\controllers;

use Yii;
use yii\BaseYii;
use yii\rest\ActiveController;
use app\models\Person;

/**
 * Class PeopleController реализует контроллер, обслуживающий REST API.
 * @package app\controllers
 */

class PeopleController extends ActiveController {
    public $modelClass = 'app\models\Person';
    // Переопределяет действие IndexAction() наследуемого класса;
    //public $defaultAction = 'read';

    /**
     * Обрабатывает GET-запросы к URI /person/
     * JSON-ответ:
     * curl -H "Accept: application/json" http://yii2.bot.net/person/
     * XML-ответ:
     * curl -H "Accept: application/xml" http://yii2.bot.net/person/
     * @return string строка со список персон.
     */
    public function actionRead() {
        //dump2log('actionRead()');
        return Person::find()
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }

    /**
     * Обрабатывает GET-запросы к URI /person/{id}/
     * JSON-ответ:
     * curl -H "Accept: application/json" http://yii2.bot.net/person/1/
     * XML-ответ:
     * curl -H "Accept: application/xml" http://yii2.bot.net/person/1/
     * @param $id int идентификатор персоны.
     * @return null|static string персона.
     */
    public function actionReadById($id) {
        $person = Person::findOne($id);
        dump2log($person, 'debug.log');
        //Yii::debug($person, __METHOD__);
        return $person;
    }

    /**
     * Обрабатывает POST-запросы к URI /person/create/
     * Создаёт персону.
     * JSON-запрос и JSON-ответ:
     * curl -X POST -H "Accept: application/json" -H "Content-Type: application/json" -d '{"id":0,"firstName":"FooFirst","lastName":"FooLast"}' http://yii2.bot.net/person/create
     * @return \yii\web\Response
     */
    public function actionMake() {
        $model = new Person();
        $data = Yii::$app->request->post();
        $model->firstname = $data['firstName'];
        $model->lastname = $data['lastName'];
        dump2log($model);
        if ($model && $model->save()) {
            Yii::$app->response->statusCode = 201;
            return [
                'status' => 'created',
                'id' => $model->id
            ];
        } else {
            return [
                'status' => 'error'
            ];
        }
    }

    /**
     * Обрабатывает DELETE-запросы к URI /person/delete/{id}/
     * @param $id int идентификатор персоны.
     * JSON-ответ:
     * curl -X DELETE -H "Accept: application/json" -H "Content-Type: application/json" http://yii2.bot.net/person/delete/5/
     * @return null|static string удалённая персона. В противном случае null.
     */
    public function actionRemove($id) {
        $model = Person::findOne($id);
        $model->delete();
        return $model;
    }

    /**
     * Обрабатывает PUT-запросы к URI /person/update/{id}/
     * @param $id int идентификатор персоны.
     * JSON-запрос и JSON-ответ:
     * curl -X PUT -H "Accept: application/json" -H "Content-Type: application/json" -d '{"id":3,"firstName":"Petr","lastName":"Petrov"}' http://yii2.bot.net/person/update/3/
     * @return \yii\web\Response
     */
    public function actionModify($id) {
        $model = Person::findOne($id);
        $data = Yii::$app->request->post();
        $model->firstname = $data['firstName'];
        $model->lastname = $data['lastName'];
        if ($model && $model->save()) {
            return [
                'status' => 'updated',
                'id' => $model->id
            ];
        } else {
            return [
                'status' => 'error'
            ];
        }
    }
}