<?php

use app\models\Borrowed;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BorrowedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Borrowed';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowed-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (yii::$app->user->id):?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_id',
            'user_id',
            'borrowed_date',
            'borrowed_time',
            //'return_date',
            [
                'label' => 'Borrowed',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Return', ['return', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to return this book?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ]); ?>
 <?php endif; ?>
<?php if (yii::$app->user->isGuest):?>
    <p>Please Login to view Borrowed books.</p>
    <?php endif; ?>
</div>
