<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Livevents */

$this->title = $model->le_id;
$this->params['breadcrumbs'][] = ['label' => 'Livevents Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livevents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->le_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->le_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'le_id',
            'le_contact_name',
            'le_role',
            'le_event_category',
            'le_event_name',
            'le_description',
            'le_venue',
            'le_city_id',
            'le_contacts',
            'le_emailid:email',
            'verified',
            'paid',
        ],
    ]) ?>

</div>
