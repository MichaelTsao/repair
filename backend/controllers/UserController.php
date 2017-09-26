<?php

namespace backend\controllers;

use backend\models\UserSearch;
use common\models\Place;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $place = new Place();

        if ($type = Yii::$app->request->post('set-place')) {
            $place->scenario = $type;
            $place->load(Yii::$app->request->post());
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $place->load(Yii::$app->request->post());
                $model->area = $place->area;
                if ($image = UploadedFile::getInstance($model, 'icon_file')) {
                    $model->icon_file = $image;
                }
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->uid]);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'place' => $place,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($type = Yii::$app->request->post('set-place')) {
            $place = new Place();
            $place->scenario = $type;
            $place->load(Yii::$app->request->post());
        } else {
            $place = Place::create($model);
            if ($model->load(Yii::$app->request->post())) {
                $place->load(Yii::$app->request->post());
                $model->area = $place->area;
                $model->icon_file = UploadedFile::getInstance($model, 'icon_file');
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
            'place' => $place,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
