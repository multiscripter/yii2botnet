<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1><?=$h1;?></h1>
<ul><?
    foreach ($countries as $country) { ?>
    <li>
        <?= Html::encode("{$country->code} ({$country->name})") ?>:
        <?= $country->population ?>
    </li><?
    } ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>