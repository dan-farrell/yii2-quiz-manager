<?php

$this->title = 'Quiz Manager';

use yii\bootstrap\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;

$actions = [
  'class' => ActionColumn::className(),
  'header' => 'Actions',
  // 'buttons' => [
  //   'view' => function ($url, $model) {
  //     return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'lead-view'),]);
  //   },

  //   'update' => function ($url, $model) {
  //     return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'lead-update')]);
  //   },
  //   'delete' => function ($url, $model) {
  //     return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'lead-delete')]);
  //   }

  // ],
  // 'urlCreator' => function ($action, $model, $key, $index) {
  //   if ($action === 'view') {
  //     $url ='index.php?r=client-login/lead-view&id='.$model->quiz_id;
  //     return $url;
  //   }

  //   if ($action === 'update') {
  //     $url ='index.php?r=client-login/lead-update&id='.$model->quiz_id;
  //     return $url;
  //   }
  //   if ($action === 'delete') {
  //     $url ='index.php?r=client-login/lead-delete&id='.$model->quiz_id;
  //     return $url;
  //   }
  // }
];

?>

<div class="row">
  <div class="col-md-12">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      echo Html::button('Create Quiz', ['class' => 'float-right']);
    } ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
        'name',
        'questions',
        $actions,
      ],
    ]); ?>
  </div>
</div>
