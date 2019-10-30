<?php

namespace app\models;

use app\models\Question;

/**
 *
 */
class Quiz extends \yii\db\ActiveRecord
{

  public function rules()
  {
    return [
      [['name'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'quiz';
  }

  public function attributeLabels()
  {
    return [
      'quiz_id' => 'ID',
      'name' => 'name'
    ];
  }

  public function insertFormData()
  {
    $quiz = new Quiz();
    $quiz->name = $this->name;
    $quiz->save;

    return $form->save();
  }

}
