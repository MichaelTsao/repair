<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 15/11/19
 * Time: 上午11:46
 */

namespace frontend\controllers;

use Yii;
use common\models\Orders;
use common\models\Worker;

class WorkerController extends \yii\web\Controller
{
    public function actionOrdersList()
    {
        $data = Orders::find()->where(['worker_id' => \Yii::$app->user->identity->worker->worker_id])->orderBy('ctime desc')->all();
        return $this->render('ordersList', ['data' => $data]);
    }

    public function actionOrderInfo($id)
    {
        $data = Orders::findOne(['order_id' => $id]);
        return $this->render('orderInfo', ['data' => $data]);
    }

    public function actionAccept($id)
    {
        Orders::findOne(['order_id' => $id])->updateAttributes(['status' => 2, 'accept_time' => date('Y-m-d H:i:s')]);
        return $this->redirect('orders-list');
    }

    public function actionRefuse($id)
    {
        Orders::findOne(['order_id' => $id])->updateAttributes(['status' => 3, 'access_time' => date('Y-m-d H:i:s')]);
        return $this->redirect('orders-list');
    }

    public function actionHasPay($id)
    {
        Orders::findOne(['order_id' => $id])->updateAttributes(['status' => 4, 'pay_time' => date('Y-m-d H:i:s')]);
        return $this->redirect('orders-list');
    }

    public function actionSetServiceTime($id, $time)
    {
        Orders::findOne(['order_id' => $id])->updateAttributes(['status' => 7, 'service_time' => $time]);
        return $this->redirect('orders-list');
    }

    public function actionStart($id)
    {
        Orders::findOne(['order_id' => $id])->updateAttributes(['status' => 8, 'start_time' => date('Y-m-d H:i:s')]);
        return $this->redirect('orders-list');
    }

    public function actionApply()
    {
        $model = new Worker();

        if ($model->load(Yii::$app->request->post())) {
            $uid = Yii::$app->user->id;
            $data = Worker::findOne(['uid'=>$uid]);
            if (!$data) {
                $model->uid = $uid;
                if ($model->save()) {
                    return $this->redirect('/');
                }
            }
        }
        return $this->render('apply', ['model' => $model]);
    }
}