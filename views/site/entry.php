<?
use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>
<div class="row">
    <div class="col-md-6"><?
        $form = ActiveForm::begin([
            'id' => 'form-entry-id',
            // html-атрибуты.
            'options' => [
                'class' => 'form-entry-class',
                'data-info' => 'some info'
            ]
        ]); ?>

        <?= $form->field($model, 'name')->label('Ваше имя') ?>

        <?= $form->field($model, 'email')->label('Ваше email') ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>