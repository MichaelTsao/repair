<?php

namespace frontend\controllers;

use common\models\Orders;
use common\models\Service;
use common\models\Worker;
use Yii;
use yii\web\Session;

class OrdersController extends \yii\web\Controller
{
    private $session;

    public function init()
    {
        parent::init();
        $this->session = new Session();
        $this->session->open();
    }

    public function actionChooseService($id = 0)
    {
        if ($id) {
            $this->session['service'] = $id;
            return $this->redirect('/orders/confirm');
        }
        $data = Service::findAll(['status' => 1]);
        return $this->render('chooseService', ['service' => $data]);
    }

    public function actionChooseWorker($id = 0)
    {
        if ($id) {
            $this->session['worker'] = $id;
            return $this->redirect('/orders/confirm');
        }
        $data = Worker::find()->all();
        return $this->render('chooseWorker', ['worker' => $data]);
    }

    public function actionConfirm()
    {
        return $this->render('confirm', ['serviceId' => $this->session['service']]);
    }

    public function actionList()
    {
        if (is_null(Yii::$app->user->getId())) {
            return $this->redirect('/');
        }
        $data = Orders::find()->where(['uid' => Yii::$app->user->getId()])->orderBy('ctime desc')->all();
        return $this->render('list', ['data' => $data]);
    }

    public function actionInfo($id)
    {
        $data = Orders::findOne($id);
        return $this->render('info', ['data' => $data]);
    }

    public function actionCreate()
    {
        $worker = null;
        $workers = Worker::find()->all();
        if ($workers) {
            $key = array_rand($workers);
            $worker = $workers[$key];
        }

        $order = new Orders();
        $order->uid = Yii::$app->user->id;
        $order->service_id = $this->session['service'];
        $order->price = Service::findOne($this->session['service'])->price;
        $order->status = 1;
        $worker && $order->worker_id = $worker->id;
        $order->save();

        return $this->render('finish');
    }

    public function actionCancel($id)
    {
        Orders::findOne($id)->updateAttributes(['status' => 9, 'cancel_time' => date('Y-m-d H:i:s')]);
        return $this->redirect('list');
    }

    public function actionComment($id, $rate)
    {
        Orders::findOne($id)->updateAttributes(['status' => 6, 'rate' => $rate]);
        return $this->redirect('list');
    }

    public function actionFinish($id)
    {
        Orders::findOne($id)->updateAttributes(['status' => 5, 'finish_time' => date('Y-m-d H:i:s')]);
        return $this->redirect('list');
    }
}
