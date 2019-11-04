<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

/**
 *
 */
class Answer extends \yii\db\ActiveRecord
{

  /**
   *
   */
  public function rules()
  {
    return [
      [['answer', 'question_id'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'answer';
  }

  /**
   *
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
