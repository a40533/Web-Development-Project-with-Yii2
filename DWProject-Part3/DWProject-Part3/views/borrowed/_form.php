<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Borrowed $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="borrowed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'borrowed_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'borrowed_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'return_date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
