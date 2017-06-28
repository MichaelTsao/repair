<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 15/12/23
 * Time: 上午10:06
 */

namespace console\controllers;

use common\models\Account;

class ManageController extends \yii\console\Controller
{
    public function actionAddAdmin($name, $password, $company_id=0){
        $admin = new Account();
        $admin->username = $name;
        $admin->password_raw = $password;
        $admin->company_id = $company_id;
        if (!$admin->save()) {
            foreach ($admin->errors as $key => $msgs) {
                echo $key.":".implode('; ', $msgs)."\n";
            }
        }
        return 0;
    }
}