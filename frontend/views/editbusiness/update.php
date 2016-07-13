<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Editbusiness */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Editbusiness',
]) . ' ' . $model->edit_bui_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Editbusinesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edit_bui_id, 'url' => ['view', 'id' => $model->edit_bui_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="editbusiness-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
