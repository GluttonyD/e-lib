<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 19:29
 */

namespace backend\controllers;

use backend\models\ExcelModel;
use Yii;
use yii\web\Controller;
use moonland\phpexcel\Excel;

class ExcelController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login')->send();
        }
        return true;
    }

    public function actionExport(){
        ExcelModel::export();
    }
}