<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchLivevents */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Livevents Galleries';
$this->params['breadcrumbs'][] = $this->title;
?> 
<div class="livevents-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        
        'columns' => [
            'le_id',
            'le_contact_name',
            'le_role',
            'le_event_category',
            'le_event_name',
            'verified',
            'paid',
          ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'template' => '{view} {update} {delete}',
              'buttons' => [
                 'view' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
                 },
                 'update' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                 },
                 'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,[
                        'title' => Yii::t('yii', 'Delete'),
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                    ]);
                 },
              ],
              'urlCreator' => function ($action, $dataProvider, $key, $index) {

                if ($action === 'view') {
                     return Url::to(['liveventsgallery/view', 'id' =>$dataProvider['le_id']]);
                }
                if ($action === 'update') {
                    return Url::to(['/liveventsgallery/update', 'id' =>$dataProvider['le_id']]);
                }
                if ($action === 'delete') {
                   return Url::to(['/liveventsgallery/delete', 'id' =>$dataProvider['le_id']]);
                }                    
                return $url;
            }
          ],
      ],
    ]); ?>

</div>
