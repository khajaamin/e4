<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Emails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emails-view">

  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            'subject',
            'content',
        ],
    ]) ?>

</div>
