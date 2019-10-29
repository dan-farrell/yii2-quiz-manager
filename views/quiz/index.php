<?php

$this->title = 'Quiz Manager';

use yii\bootstrap\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

?>

<div class="row">
  <div class="col-md-12">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      echo Html::a('Create Quiz', ['/quiz/create'], ['class'=>'btn btn-primary float-right']);
    } ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
        'name',
        [
          'class' => ActionColumn::className(),
          'header' => 'Actions',
          'headerOptions' => ['style' => 'width:20%'],
          'buttons' => [
            'view' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url = Url::to(['quiz/view', 'id' => $model->quiz_id]), [
                'class' => 'btn icon-btn',
                'title' => Yii::t('app', 'View Quiz'),
              ]);
            },

            'update' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url = Url::to(['quiz/edit', 'id' => $model->quiz_id]), [
                'class' => 'btn icon-btn',
                'title' => Yii::t('app', 'Edit Quiz'),
              ]);
            },
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['quiz/delete', 'id' => $model->quiz_id]), [
                'class' => 'btn icon-btn',
                'title' => Yii::t('app', 'Delete Quiz'),
              ]);
            }
          ]
        ],
      ],
    ]); ?>
  </div>
</div>
