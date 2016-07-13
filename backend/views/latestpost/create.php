<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Latestpost */

$this->title = Yii::t('app', 'Create Latestpost');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Latestposts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="latestpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
