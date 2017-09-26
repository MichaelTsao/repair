<?php

namespace backend\controllers;

use backend\models\WorkerSearch;
use common\models\Place;
use common\models\User;
use common\models\Worker;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * WorkerController implements the CRUD actions for Worker model.
 */
class WorkerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Worker models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Worker model.
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
     * Creates a new Worker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_user = new User();
        $model = new Worker();
        $place = new Place();

        if ($type = Yii::$app->request->post('set-place')) {
            $place->scenario = $type;
            $place->load(Yii::$app->request->post());
        } else {
            if ($model_user->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {
                $place->load(Yii::$app->request->post());
                $model_user->area = $place->area;
                if ($model_user->save()) {
                    $model->uid = $model_user->id;
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $model_user->delete();
                    }
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'model_user' => $model_user,
            'place' => $place,
        ]);
    }

    /**
     * Updates an existing Worker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_user = User::findOne($model->uid);

        if ($type = Yii::$app->request->post('set-place')) {
            $place = new Place();
            $place->scenario = $type;
            $place->load(Yii::$app->request->post());
        } else {
            $place = Place::create($model_user);
            $place->load(Yii::$app->request->post());
            $model_user->area = $place->area;
            if ($model->load(Yii::$app->request->post()) && $model->save()
                && $model_user->load(Yii::$app->request->post()) && $model_user->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'model_user' => $model_user,
            'place' => $place,
        ]);
    }

    /**
     * Deletes an existing Worker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Worker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Worker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Worker::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
