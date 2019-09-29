<?php

namespace app\models;

use \yii\db\ActiveRecord;

class Person extends ActiveRecord {

    public static function tableName() {
        return 'persons';
    }
}
