<?php
/** @var $model \app\models\Article */
?>

<div>
    <a href="<?php echo \yii\helpers\Url::to(['/article/view','ID'=>$model->ID])?>">
        <h3><?php echo \yii\helpers\Html::encode($model->Title)?></h3>
    </a>
    
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords($model->getEncodedBody(),40)?>
    </div>
    <p class="text-muted">
    <small>Created At : <b><?php echo yii::$app->formatter->asRelativeTime($model->created_at) ?></b> 
        By : <b><?php echo $model->createdBy->username ?></b>
    </small>
</p>
    <hr>
</div>