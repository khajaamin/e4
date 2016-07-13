<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Livevents */

$this->title = 'Create Livevents Galleries';
$this->params['breadcrumbs'][] = ['label' => 'Livevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livevents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
