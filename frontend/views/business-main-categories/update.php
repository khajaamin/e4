<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessMainCategories */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Business Main Categories',
]) . ' ' . $model->bmc_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Main Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bmc_id, 'url' => ['view', 'id' => $model->bmc_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="business-main-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
