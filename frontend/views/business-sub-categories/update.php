<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessSubCategories */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Business Sub Categories',
]) . ' ' . $model->bsc_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Sub Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bsc_id, 'url' => ['view', 'id' => $model->bsc_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="business-sub-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
