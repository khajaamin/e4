<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VendorsMoreCategories */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vendors More Categories',
]) . ' ' . $model->vmc_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendors More Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vmc_id, 'url' => ['view', 'id' => $model->vmc_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vendors-more-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
