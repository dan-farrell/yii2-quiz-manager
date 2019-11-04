<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

/**
 * Question is the model behind the questions
 */
class Question extends \yii\db\ActiveRecord
{

  /**
   * @return array the validation rules.
   */
  public function rules()
  {
    return [
      [['name', 'quiz_id'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   *
   * @return string
   */
  public static function tableName()
  {
    return 'questions';
  }

  /**
   * @return array
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
