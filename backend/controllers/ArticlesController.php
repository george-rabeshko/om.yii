<?php

namespace backend\controllers;

use Yii;
use common\models\Categories;
use common\models\Articles;
use backend\models\ArticlesSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
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
     * Lists all Articles of a category.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = $this->getSearchModel();
        $request = \Yii::$app->request;

        $currentCategory = Categories::findOne(['uri' => $request->get('uri')]);
        $dataProvider = $searchModel->search($request->queryParams, $currentCategory->id);

        return $this->render('index', [
            'currentCategoryName' => $currentCategory->name,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
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
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = $this->getModel();

        $date = date('Y-m-d');
        $model->created = $date;
        $model->updated = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->setMainImage($model);
            return $this->redirect(['view', 'uri' => $model->category->uri,'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'items' => $this->getItems(),
        ]);
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->setMainImage($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'items' => $this->getItems(),
        ]);
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $uri = $model->category->uri;

        $msg = ($model->delete())
            ? ['name' => 'deleteArticleSuccessful', 'type' => 'success']
            : ['name' => 'deleteArticleFailure', 'type' => 'error'];

        \Yii::$app->session->setFlash($msg['name'], $msg['type']);

        return $this->redirect(['/articles?uri=' . $uri]);
    }

    /**
     * Set main image for an article
     * @param mixed $model
     * @return mixed
     */
    private function setMainImage($model)
    {
        if (!$model->image = UploadedFile::getInstance($model, 'image')) return false;

        $path = \Yii::getAlias('@images') . $model->image->baseName . '.' . $model->image->extension;
        $model->image->saveAs($path);

        return $model->attachImage($path, true);
    }

    /**
     * Group data for Html::activeDropDownList method
     * @return array
     */
    private function getItems()
    {
        return [
            'categories' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
            'article_status' => [10 => 'Опубліковано', 0 => 'Прихована стаття'],
            'comments_status' => [10 => 'Дозволені', 0 => 'Заборонені'],
        ];
    }

    /**
     * Finds the CommentsSearch model.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return ArticlesSearch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function getSearchModel()
    {
        if (($model = new ArticlesSearch()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');
        }
    }

    /**
     * Finds the Comments model.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function getModel()
    {
        if (($model = new Articles()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');
        }
    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');
        }
    }
}
