<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Borrowed $model */

$this->title = 'Create Borrowed';
$this->params['breadcrumbs'][] = ['label' => 'Borroweds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
