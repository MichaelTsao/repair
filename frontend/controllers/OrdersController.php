<?php

namespace frontend\controllers;

use Yii;
use common\models\Worker;
use common\models\Orders;
use common\models\Service;
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

    public function actionChooseService($id=0)
    {
        if ($id) {
            $this->session['service'] = $id;
            return $this->redirect('/orders/confirm');
        }
        $data = Service::findAll(['status'=>1]);
        return $this->render('chooseService', ['service'=>$data]);
    }

    public function actionChooseWorker($id=0)
    {
        if ($id) {
            $this->session['worker'] = $id;
            return $this->redirect('/orders/confirm');
        }
        $data = Worker::find()->all();
        return $this->render('chooseWorker', ['worker'=>$data]);
    }

    public function actionConfirm()
    {
        $data['service'] = $this->session['service'];
        return $this->render('confirm', ['data'=>$data]);
    }

    public function actionList(){
        if (is_null(Yii::$app->user->getId())) {
            return $this->redirect('/');
        }
        $data = Orders::find()->where(['uid' => Yii::$app->user->getId()])->orderBy('ctime desc')->all();
        return $this->render('list', ['data'=>$data]);
    }

    public function actionInfo($id){
        $data = Orders::findOne(['order_id'=>$id]);
        return $this->render('info', ['data'=>$data]);
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
        $order->price = Service::findOne(['service_id'=>$this->session['service']])->price;
        $order->status = 1;
        $worker && $order->worker_id = $worker->worker_id;
        $order->save();

        return $this->render('finish');
    }

    public function actionCancel($id){
        Orders::findOne(['order_id'=>$id])->updateAttributes(['status'=>9, 'cancel_time'=>date('Y-m-d H:i:s')]);
        return $this->redirect('list');
    }

    public function actionComment($id, $rate){
        Orders::findOne(['order_id'=>$id])->updateAttributes(['status'=>6, 'rate'=>$rate]);
        return $this->redirect('list');
    }

    public function actionFinish($id)
    {
        Orders::findOne(['order_id'=>$id])->updateAttributes(['status'=>5, 'finish_time'=>date('Y-m-d H:i:s')]);
        return $this->redirect('list');
    }
}
