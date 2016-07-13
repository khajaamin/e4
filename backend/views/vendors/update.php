<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vendors */
ini_set('memory_limit', '-1');
$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vendors',
]) . ' ' . $model->ven_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ven_id, 'url' => ['view', 'id' => $model->ven_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vendors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsVendorsMoreCategories' => $modelsVendorsMoreCategories,
    ]) ?>

</div>
