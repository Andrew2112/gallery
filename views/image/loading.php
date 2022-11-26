<?php

use app\models\Images;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $model Images
 */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file[]')->widget(FileInput::class, [
    'options' => ['multiple' => true, 'accept' => 'image/*'],
]); ?>
<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>


<?php ActiveForm::end() ?>
