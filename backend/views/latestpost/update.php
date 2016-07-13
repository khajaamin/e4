<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Latestpost */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Latestpost',
]) . ' ' . $model->latest_post_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Latestposts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->latest_post_id, 'url' => ['view', 'id' => $model->latest_post_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="latestpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
