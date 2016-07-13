<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CommentsAndRatings */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Comments And Ratings',
]) . ' ' . $model->cr_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comments And Ratings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cr_id, 'url' => ['view', 'id' => $model->cr_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="comments-and-ratings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
