<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Videos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Videos',
]) . ' ' . $model->vdo_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vdo_id, 'url' => ['view', 'id' => $model->vdo_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="videos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
