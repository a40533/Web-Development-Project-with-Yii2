<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Borrowed $model */

$this->title = 'Update Borrowed: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Borroweds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="borrowed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
