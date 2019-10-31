<?php

namespace app\models;

/**
 *
 */
class Question extends \yii\db\ActiveRecord
{

  /**
   *
   */
  public function rules()
  {
    return [
      [['name', 'quiz_id'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'questions';
  }

  /**
   *
   */
  public function attributeLabels()
  {
    return [
      'question_id' => 'ID',
      'name' => 'name',
      'quiz_id' => 'quiz_id'
    ];
  }

}
