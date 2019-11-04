<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

/**
 * Answer is the model behind the answers
 */
class Answer extends \yii\db\ActiveRecord
{

  /**
   * @return array the validation rules.
   */
  public function rules()
  {
    return [
      [['answer', 'question_id'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   *
   * @return string
   */
  public static function tableName()
  {
    return 'answer';
  }

  /**
   * @return array
   */
  public function attributeLabels()
  {
    return [
      'answer_id' => 'ID',
      'answer' => 'answer',
      'question_id' => 'question_id'
    ];
  }

}
