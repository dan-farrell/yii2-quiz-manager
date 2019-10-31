<?php

use yii\bootstrap\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Quiz Manager - Edit - '.$title;

?>

<div class="row mb-15">
  <div class="col-xs-6 text-left">
    <?php // Html::a('<span class="glyphicon glyphicon-chevron-left"></span>Back to Questions', Url::to(['quiz/index']), ['class'=>'btn btn-primary btn-rounded btn-back']); ?>
  </div>

  <div class="col-xs-6 text-right">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      // echo Html::a('Delete Quiz', Url::to(['quiz/delete', 'id' => $questionId]), ['class'=>'btn btn-secondary btn-rounded mr-15']);
      // echo Html::a('View Quiz', Url::to(['quiz/view', 'id' => $questionId]), ['class'=>'btn btn-primary btn-rounded']);
    } ?>
  </div>
</div>

<div class="row mb-15">
  <div class="col-md-6 text-left">
    <h3><?= $title; ?></h3>
  </div>

  <div class="col-md-6 text-right">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      // echo Html::a('Add Question', Url::to(['question/add']), ['class'=>'btn btn-primary btn-rounded']);

      echo Html::tag('button', 'Add Answer', [
        'type' => 'button',
        'class' => 'btn btn-primary btn-rounded',
        'data-toggle' => 'modal',
        'data-target' => '#addAnswer',
      ]);
    } ?>
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
          'buttons' => [
            'update' => function ($url, $model) {
              // return Html::tag('button', '<span class="glyphicon glyphicon-pencil"></span>', [
              //   'type' => 'button',
              //   'class' => 'btn btn-primary btn-rounded',
              //   'data-toggle' => 'modal',
              //   'data-target' => '#editAnswer',
              // ]);

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
          // 'template' => '{update} {delete}',
          'template' => '{update} {delete}',
        ],
      ],
    ]); ?>
  </div>
</div>

<?php if (Yii::$app->user->identity->permission === 'edit') {
  echo $this->render('/question/components/add-answer', [
    'answer' => $answer,
    'questionId' => $questionId,
  ]);

  echo $this->render('/question/components/edit-answer', [
    'answer' => $answer,
    'questionId' => $questionId,
  ]);
}?>
