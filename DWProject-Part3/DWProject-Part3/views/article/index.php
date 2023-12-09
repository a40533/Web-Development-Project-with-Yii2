<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
<?php if (yii::$app->user->isGuest):?>
    <p>Please Login to create an Article.</p>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (!yii::$app->user->isGuest):?>
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'itemView' => '_article_item'
    ]); ?>


</div>
