<?php

namespace backend\controllers;

use Yii;
use common\models\Articles;
use common\models\Comments;
use backend\models\CommentsSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = $this->getSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = $this->getModel();
        $request = \Yii::$app->request;

        $date = date('Y-m-d');
        $model->created = $date;
        $model->updated = $date;

        if ($model->load($request->post())) {
            $model->article_id = Articles::find()
                ->select('id')
                ->filterWhere(['like', 'title', $request->post('link')])
                ->scalar();

            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);

            \Yii::$app->session->setFlash('cantSaveData', 'error');
        }

        $data = ArrayHelper::map(Articles::find()->all(), 'id', 'title');

        return $this->render('create', [
            'data' => $data,
            'model' => $model,
            'items' => $this->getItems(),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        $model->status = 10;

        $msg = ($model->save())
            ? ['name' => 'approveCommentSuccessful', 'type' => 'success']
            : ['name' => 'approveCommentFailure', 'type' => 'error'];

        \Yii::$app->session->setFlash($msg['name'], $msg['type']);

        return $this->redirect(Url::to(['/comments']));
    }

    /**
     * Updates an existing Comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect(['view', 'id' => $model->id]);

        $data = ArrayHelper::map(Articles::find()->all(), 'id', 'title');

        return $this->render('update', [
            'data' => $data,
            'model' => $model,
            'items' => $this->getItems(),
        ]);
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $msg = ($this->findModel($id)->delete())
            ? ['name' => 'deleteCommentSuccessful', 'type' => 'success']
            : ['name' => 'deleteCommentFailure', 'type' => 'error'];

        \Yii::$app->session->setFlash($msg['name'], $msg['type']);

        return $this->redirect(['index']);
    }

    /**
     * Group data for Html::activeDropDownList method
     * @return array
     */
    private function getItems()
    {
        return [10 => 'Опубліковано', 0 => 'В черзі'];
    }

    /**
     * Finds the CommentsSearch model.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return CommentsSearch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function getSearchModel()
    {
        if (($model = new CommentsSearch()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');
        }
    }

    /**
     * Finds the Comments model.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function getModel()
    {
        if (($model = new Comments()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');
        }
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');
        }
    }
}