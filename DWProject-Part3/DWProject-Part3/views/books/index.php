<?php

use app\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BooksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (!yii::$app->user->isGuest):?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'genre',
            'book_name',
            'author_name',
            'publication_date',
            [
                'label' => 'Borrow',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Borrow', ['borrow', 'id' => $model->id], ['class' => 'btn btn-primary']);
                },
            ],
        ],
    ]); ?>

    <?php endif; ?>
<?php if (yii::$app->user->isGuest):?>
    <p>Please Login to view books.</p>
    <?php endif; ?>
</div>
