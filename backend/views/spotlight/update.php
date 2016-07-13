<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Spotlight */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Spotlight',
]) . ' ' . $model->spotlt_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Spotlights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->spotlt_id, 'url' => ['view', 'id' => $model->spotlt_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="spotlight-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
