<?php

use yii\widgets\ListView;

// Quiz title goes here

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'view/index',
  'itemView' => function ($model, $key, $index, $widget) {
    return $this->render('view/index',['model' => $model]);
  },
  'options' => [
    'tag' => 'ol',
  ],
  'layout' => '{items}'
]);

