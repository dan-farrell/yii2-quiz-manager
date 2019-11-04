<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

$this->title = 'Quiz Manager';

use yii\bootstrap\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$template = '{view}';

if (Yii::$app->user->identity->permission === 'edit') {
  $template = '{view} {update} {delete}';
}

?>

<div class="row mb-15">
  <div class="col-md-12 text-right">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      echo Html::tag('button', 'Create Quiz', [
        'type' => 'button',
        'class' => 'btn btn-primary btn-rounded',
        'data-toggle' => 'modal',
        'data-target' => '#createQuiz',
      ]);
    } ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h3>Quiz Manager</h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'options' => ['class' => 'quiz-table'],
      'columns' => [
        'name',
        [
          'class' => ActionColumn::className(),
          'header' => 'Actions',
          'headerOptions' => ['class' => 'quiz-table-actions'],
          'buttons' => [
            'view' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['quiz/view', 'id' => $model->quiz_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'View Quiz'),
              ]);
            },
            'update' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['quiz/edit', 'id' => $model->quiz_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'Edit Quiz'),
              ]);
            },
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['quiz/delete', 'id' => $model->quiz_id]), [
                'class' => 'btn btn-primary btn-rounded',
                'title' => Yii::t('app', 'Delete Quiz'),
              ]);
            },
          ],
          'template' => $template,
        ],
      ],
    ]); ?>
  </div>
</div>

<?php if (Yii::$app->user->identity->permission === 'edit') {
  echo $this->render('/quiz/components/create-quiz', ['quiz' => $quiz]);
}?>
