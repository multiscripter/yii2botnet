<?php
/**
 * Created by PhpStorm.
 * User: cyberbotx
 * Date: 04.09.2019
 * Time: 0:04
 */

namespace app\models;

use yii\base\Model;

/**
 * Class EntryForm хранит данные, введённые пользователем.
 * @package app\models
 */
class EntryForm extends Model {
    public $name;
    public $email;

    public function rules() {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email']
        ];
    }
}