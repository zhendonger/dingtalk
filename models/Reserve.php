<?php
namespace micro\models;

class Reserve extends \yii\base\Model{

    public $customer_name;
    public $stage_name;
    public $name;
    public $phone;
    public $dept_id;
    public $creater_id;

    public function attributeLabels() {
        return [
            'customer_name'=>'客户姓名',
            'stage_name'=>'接待地点',
            'name'=>'检参观人查日期',
            'phone'=>'联系手机',
            'dept_id'=>'部门ID',
            'creater_id'=>'用户ID',
        ];
    }
    public function rules() {
        return [
            [['customer_name','stage_name','name','phone','dept_id','creater_id'],'required','message'=>'{attribute}必须被设置'],
        ];
    }

}