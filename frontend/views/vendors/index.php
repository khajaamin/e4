<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
ini_set('memory_limit', '-1');
$this->title = Yii::t('app', 'List of all Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="float:right;">
        <?= Html::a(Yii::t('app', 'Add New Company'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
       // 'dataProvider' => $dataProvider,
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        
        'columns' => [
            'ven_id',
            'ven_company_name',
            'ven_website',
             'ven_contact_no',
             'ven_email_id:email',
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
                     return Url::to(['vendors/view', 'id' =>$dataProvider['ven_id']]);
                }
                if ($action === 'update') {
                    return Url::to(['/vendors/update', 'id' =>$dataProvider['ven_id']]);
                }
                if ($action === 'delete') {
                   return Url::to(['/vendors/delete', 'id' =>$dataProvider['ven_id']]);
                }                    
                return $url;
            }
          ],
      ],
    ]); ?>

</div>
