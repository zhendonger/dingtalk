<?php
namespace micro\models;

class Assess extends \yii\base\Model{
    public $customer_name;
    public $service_intent;
    public $assess_url;
    public $dept_id;
    public $creater_id;
    public function attributeLabels() {
        return [
            'customer_name'=>'客户姓名',
            'service_intent'=>'服务意向',
            'assess_url'=>'体检报告',
            'dept_id'=>'部门ID',
            'creater_id'=>'用户ID',
        ];
    }
    public function rules() {
        return [
            [['customer_name','service_intent','assess_url','dept_id','creater_id'],'required','message'=>'{attribute}必须被设置'],
        ];
    }

}