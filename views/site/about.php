<?php

/* @var $this yii\web\View */
use yii\BaseYii;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Это страница "О нас". Вы можете изменить следующий файл, чтобы настроить его содержимое:
    </p>

    <code><?= __FILE__ ?></code>
</div>
<br>
Выхлоп функции dump2log($this); без второго аргемнута<br><br>
<? dump2log($this->assetManager); ?>
<br>
Выхлоп метода VarDumper::dump($this>assetManager);<br><br>
<? VarDumper::dump($this->assetManager); ?>
