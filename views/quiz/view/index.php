<?php

use app\models\Answer;

$query = Answer::find()
  ->andWhere(['question_id' => $model->question_id])
  ->orderBy(['answer_id' => SORT_ASC])
  ->all();

?>

<li style="padding: 15px 0; border-bottom: 1px solid black;">
  <?= $model->name; ?>

  <?php if (Yii::$app->user->identity->permission !== 'restricted') { ?>
    <ol type="A">
      <?php foreach ($query as $item) { ?>
        <li><?= $item->answer; ?></li>
      <?php } ?>
    </ol>
  <?php } ?>
</li>
