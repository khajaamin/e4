<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="float:right">
        <?= Html::a(Yii::t('app', 'Create Blog'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        'columns' => [
            'blog_id',
            'blog_tag',
            'blog_heading',
            'blog_content',
            'blog_verified',
            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'template' => '{view} {edit} {delete}',
              'buttons' => [
                 'view' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
                 },
                 'edit' => function ($url, $model) {
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
                     return Url::to(['blog/view', 'id' =>$dataProvider['blog_id']]);
                }
                if ($action === 'edit') {
                    return Url::to(['/blog/update', 'id' =>$dataProvider['blog_id']]);
                }
                if ($action === 'delete') {
                   return Url::to(['/blog/delete', 'id' =>$dataProvider['blog_id']]);
                }                    
                return $url;
            }
          ],
      ],
    ]); ?>

</div>
