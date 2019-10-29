<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>

<div class="row mb-15">
  <div class="col-md-6 text-left">
    <h3><?= $title; ?></h3>
  </div>

  <div class="col-md-6 text-right">
    <?php if (Yii::$app->user->identity->permission === 'edit') {
      echo Html::a('Delete Quiz', Url::to(['quiz/delete', 'id' => $quizId]), ['class'=>'btn btn-secondary mr-15']);
      echo Html::a('Edit Quiz', Url::to(['quiz/edit', 'id' => $quizId]), ['class'=>'btn btn-primary']);
    } ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('view/index',['model' => $model]);
      },
      'options' => ['tag' => 'ol'],
      'layout' => '{items}'
    ]); ?>
  </div>
</div>
