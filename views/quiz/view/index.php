<?php

use app\models\Answer;

$query = Answer::find()
  ->andWhere(['question_id' => $model->question_id])
  ->orderBy(['answer_id' => SORT_ASC])
  ->all();

?>

<div style="margin: 15px 0">
  <?= $model->name; ?>

  <ol type = "A">
    <?php foreach ($query as $item) { ?>
      <li><?= $item->answer; ?></li>
    <?php } ?>
  </ol>
</div>
