<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $name;
    public $phone;
    public $password;
    public $password_again;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_again', 'required'],
            ['password_again', 'string', 'min' => 6],
            ['password_again', 'compare', 'compareAttribute' => 'password', 'operator' => '=='],

            ['name', 'required'],
            ['name', 'string', 'min' => 2],
            ['name', 'string', 'max' => 5],

            ['phone', 'string', 'min' => 11],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->name = $this->name;
            $user->phone = $this->phone;
            $user->sex = 1;
            $user->city = 1;
            $user->password_raw = $this->password;
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'password_again' => '再输一次密码',
            'email' => '邮箱',
            'name' => '真实名字',
            'phone' => '手机号',
        ];
    }
}
