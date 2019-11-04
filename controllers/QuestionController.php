<?php

namespace app\controllers;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\data\ArrayDataProvider;
use yii\web\Controller;
use app\models\Answer;
use app\models\Question;

/**
 *
 */
class QuestionController extends Controller
{

  /**
   * Create Question action.
   *
   * @return redirect
   */
  public function actionCreate()
  {
    $question = new Question();
    $question->load($_POST);
    $question->save();

    return $this->redirect(['quiz/index']);
  }

  /**
   * Edit Question action.
   *
   * @return string
   */
  public function actionEdit($id)
  {
    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    return $this->render('edit-form', [
      'question' => $question,
      'id' => $id,
    ]);
  }

  /**
   * Update Question in database action.
   *
   * @return redirect
   */
  public function actionUpdate($id)
  {
    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    $question->load($_POST);
    $question->save();

    return $this->redirect(['quiz/index']);
  }

  /**
   * View Question action.
   *
   * @return string
   */
  public function actionView($id)
  {
    $title = $this->getQuestionTitle($id);
    $questionId = $id;

    $query = Answer::find()
      ->andWhere(['question_id' => $id])
      ->orderBy(['answer_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    $answer = new Answer();

    return $this->render('view', [
      'dataProvider' => $dataProvider,
      'title' => $title,
      'questionId' => $id,
      'answer' => $answer,
    ]);
  }

  /**
   * Delete Question action.
   *
   * @return redirect
   */
  public function actionDelete($id)
  {
    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    $question->delete();

    return $this->redirect(['quiz/index']);
  }

  /**
   * Get Question title.
   *
   * @return string
   */
  public function getQuestionTitle($id)
  {
    $query = Question::find()
      ->andWhere(['question_id' => $id])
      ->all();

    foreach ($query as $item) {
      return $item['name'];
    }
  }

}
