<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 13:02
 */
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username','email','password'],'string'],
            ['email','email'],
            ['username','validateUsername'],
            ['email','validateEmail'],
        ];
    }

    public function validateUsername($attribute,$params){
        $unique=User::find()->where(['username'=>$this->username])->count();
        if($unique){
            $this->addError($attribute,'Такое имя пользователя уже есть');
        }
    }
    public function validateEmail($attribute,$params){
        $unique=User::find()->where(['email'=>$this->email])->count();
        if($unique){
            $this->addError($attribute,'Такой email уже зарегистрирован');
        }
    }

    public function signup(){
        if($this->validate()){
            $user=new User();
            $user->username=$this->username;
            $user->email=$this->email;
            $user->password_hash=Yii::$app->security->generatePasswordHash($this->password);
            $user->password_reset_token=Yii::$app->security->generateRandomString();
            $user->created_at=time();
            $user->updated_at=time();
            $user->status=10;
            $user->save();
            Yii::$app->user->login($user);
            return true;
        }
        return false;
    }
}