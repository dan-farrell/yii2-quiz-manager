<?php

namespace app\controllers;

use yii\data\ArrayDataProvider;
use yii\web\Controller;

// Models
use app\models\Question;
use app\models\Quiz;

/**
 *
 */
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
      ->orderBy(['quiz_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    return $this->render('index', ['dataProvider' => $dataProvider]);
  }

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

  public function actionCreate()
  {
    $quiz = new Quiz();
    $quiz->load($_POST);
    $quiz->save();

    return $this->render('create');
  }

  public function actionEdit($id)
  {
    $title = $this->getQuizTitle($id);
    $quizId = $id;

    $query = Question::find()
      ->andWhere(['quiz_id' => $id])
      ->orderBy(['question_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    return $this->render('edit', [
      'dataProvider' => $dataProvider,
      'title' => $title,
      'quizId' => $id,
    ]);
  }

  public function actionDelete($id)
  {
    $quiz = Quiz::find()
      ->where(['quiz_id' => $id])
      ->one();

    $quiz->delete();

    return $this->redirect(['index']);
  }

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
