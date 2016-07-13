<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Livevents */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Livevents',
]) . ' ' . $model->le_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livevents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->le_id, 'url' => ['view', 'id' => $model->le_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="livevents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
