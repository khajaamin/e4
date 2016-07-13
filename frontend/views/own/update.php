<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Own */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Own',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Owns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->own_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="own-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
