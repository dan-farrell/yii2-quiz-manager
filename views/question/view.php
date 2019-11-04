<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\bootstrap\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Quiz Manager - Edit - '.$title;

?>

<div class="row mb-15">
  <div class="col-xs-12 text-left">
    <?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span>Back to Questions', Url::to(['quiz/index']), ['class'=>'btn btn-primary btn-rounded btn-back']); ?>
  </div>
</div>

<div class="row mb-15">
  <div class="col-md-6 text-left">
    <h3><?= $title; ?></h3>
  </div>

  <div class="col-md-6 text-right">
    <?= Html::tag('button', 'Add Answer', [
      'type' => 'button',
      'class' => 'btn btn-primary btn-rounded',
      'data-toggle' => 'modal',
      'data-target' => '#addAnswer',
    ]); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'options' => ['class' => 'question-table'],
      'columns' => [
        'answer',
        [
          'class' => ActionColumn::className(),
          'header' => 'Actions',
          'headerOptions' => ['class' => 'question-table-actions'],
          'template' => '{update} {delete}',
          'buttons' => [
            'update' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['answer/edit', 'id' => $model->answer_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'Edit Answer'),
              ]);
            },
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['answer/delete', 'id' => $model->answer_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'Delete Answer'),
              ]);
            },
          ],
        ],
      ],
    ]); ?>
  </div>
</div>

<?= $this->render('/question/components/add-answer', [
  'answer' => $answer,
  'questionId' => $questionId,
]); ?>
