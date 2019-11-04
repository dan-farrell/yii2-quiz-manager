<?php

namespace app\controllers;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\data\ArrayDataProvider;
use yii\web\Controller;
use app\models\Question;
use app\models\Quiz;

class QuizController extends Controller
{

  /**
   * Displays quiz page.
   *
   * @return string
   */
  public function actionIndex()
  {
    $query = Quiz::find()
      ->orderBy(['quiz_id' => SORT_DESC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    $quiz = new Quiz();

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'quiz' => $quiz,
    ]);
  }

  /**
   * View Quiz action.
   *
   * @return string
   */
  public function actionView($id)
  {
    $title = $this->getQuizTitle($id);
    $quizId = $id;

    $query = Question::find()
      ->andWhere(['quiz_id' => $id])
      ->orderBy(['question_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    return $this->render('view', [
      'dataProvider' => $dataProvider,
      'title' => $title,
      'quizId' => $id,
    ]);
  }

  /**
   * Create Quiz action.
   *
   * @return redirect
   */
  public function actionCreate()
  {
    $quiz = new Quiz();
    $quiz->load($_POST);
    $quiz->save();

    return $this->redirect(['quiz/index']);
  }

  /**
   * Edit Quiz action.
   *
   * @return string
   */
  public function actionEdit($id)
  {
    $title = $this->getQuizTitle($id);
    $quizId = $id;

    $query = Question::find()
      ->andWhere(['quiz_id' => $id])
      ->orderBy(['question_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    $question = new Question();

    return $this->render('edit', [
      'dataProvider' => $dataProvider,
      'title' => $title,
      'quizId' => $id,
      'question' => $question,
    ]);
  }

  /**
   * Delete Quiz action.
   *
   * @return redirect
   */
  public function actionDelete($id)
  {
    $quiz = Quiz::find()
      ->where(['quiz_id' => $id])
      ->one();

    $quiz->delete();

    return $this->redirect(['index']);
  }

  /**
   * Get Quiz title.
   *
   * @return steing
   */
  public function getQuizTitle($id)
  {
    $query = Quiz::find()
      ->andWhere(['quiz_id' => $id])
      ->all();

    foreach ($query as $item) {
      return $item['name'];
    }
  }

}
