<?php
/**
 * Created by PhpStorm.
 * User: tianzhendong
 * Date: 2019/3/13
 * Time: 4:59 PM
 */

namespace micro\controllers;

use EasyDingTalk\Application;
class Controller extends \yii\rest\Controller
{
    public $app;
    public function beforeAction($action)
    {
        $options = [
            'corp_id' => \Yii::$app->params['corp_id'],
            'corp_secret' => \Yii::$app->params['corp_secret'],
        ];
        return $this->app = new Application($options);
    }
}