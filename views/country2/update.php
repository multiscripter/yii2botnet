<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country2 */

$this->title = 'Update Country2: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Country2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
