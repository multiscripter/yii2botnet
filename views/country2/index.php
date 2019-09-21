<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Country2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Country2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            'population',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
