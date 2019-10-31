<?php

use yii\bootstrap\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Quiz Manager - Edit - '.$title;

?>

<div class="row mb-15">
  <div class="col-xs-6 text-left">
    <?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span>Back to Quizzes', Url::to(['quiz/index']), ['class'=>'btn btn-primary btn-rounded btn-back']); ?>
  </div>

  <div class="col-xs-6 text-right">
    <?php
    echo Html::a('Delete Quiz', Url::to(['quiz/delete', 'id' => $quizId]), ['class'=>'btn btn-secondary btn-rounded mr-15']);
    echo Html::a('View Quiz', Url::to(['quiz/view', 'id' => $quizId]), ['class'=>'btn btn-primary btn-rounded']);
    ?>
  </div>
</div>

<div class="row mb-15">
  <div class="col-md-6 text-left">
    <h3><?= $title; ?></h3>
  </div>

  <div class="col-md-6 text-right">
    <?= Html::tag('button', 'Add Question', [
      'type' => 'button',
      'class' => 'btn btn-primary btn-rounded',
      'data-toggle' => 'modal',
      'data-target' => '#addQuestion',
    ]); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'options' => ['class' => 'question-table'],
      'columns' => [
        'name',
        [
          'class' => ActionColumn::className(),
          'header' => 'Actions',
          'headerOptions' => ['class' => 'question-table-actions'],
          'buttons' => [
            'update' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['question/edit', 'id' => $model->question_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'Edit Question'),
              ]);
            },
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['question/delete', 'id' => $model->question_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'Delete Question'),
              ]);
            },
          ],
          'template' => '{update} {delete}',
        ],
      ],
    ]); ?>
  </div>
</div>

<?= $this->render('/quiz/components/add-question', [
  'question' => $question,
  'quizId' => $quizId,
]); ?>
