<?php
namespace micro\models;

class Medical extends \yii\base\Model{

    public $customer_name;
    public $service_intent;
    public $check_time;
    public $file;
    public $dept_id;
    public $creater_id;

    public function attributeLabels() {
        return [
            'customer_name'=>'客户姓名',
            'service_intent'=>'服务意向',
            'check_time'=>'检查日期',
            'file'=>'附件',
            'dept_id'=>'部门ID',
            'creater_id'=>'用户ID',
        ];
    }
    public function rules() {
        return [
            [['customer_name','service_intent','check_time','file','dept_id','creater_id'],'required','message'=>'{attribute}必须被设置'],
        ];
    }

}