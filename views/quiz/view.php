<?php

use yii\widgets\ListView;

// quiz title goes here

// print_r($dataProvider);
// die();

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'view/index',
  'itemView' => function ($model, $key, $index, $widget) {
    return $this->render('view/index',['model' => $model]);
  },
]);

