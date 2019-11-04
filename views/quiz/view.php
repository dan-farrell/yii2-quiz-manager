<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Quiz Manager - View - '.$title;

?>

<div class="row mb-15">
  <div class="col-xs-6 text-left">
    <?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span>Back', Url::to(['quiz/index']), ['class'=>'btn btn-primary btn-rounded btn-back']); ?>
  </div>

  <div class="col-xs-6 text-right">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      echo Html::a('Edit Quiz', Url::to(['quiz/edit', 'id' => $quizId]), ['class'=>'btn btn-primary btn-rounded']);
    } ?>
  </div>
</div>

<div class="row mb-15">
  <div class="col-md-12 text-left">
    <h3><?= $title; ?></h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('view/index',['model' => $model]);
      },
      'options' => [
        'class' => 'question-list',
        'tag' => 'ol',
      ],
      'layout' => '{items}'
    ]); ?>
  </div>
</div>
