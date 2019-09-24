<?php

namespace app\controllers\console;

use  yii\console\Controller;

class DefaultController extends Controller
{
    public function actionDefault() {
        echo 'console default';
        return 0;
    }
}