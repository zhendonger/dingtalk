<?php
namespace micro\models;

class NurseHome extends \yii\base\Model{
    public $customer_name;
    public $name;
    public $phone;
    public $dept_id;
    public $creater_id;

    public function attributeLabels() {
        return [
            'customer_name'=>'客户姓名',
            'name'=>'联系人',
            'phone'=>'联系电话',
            'dept_id'=>'部门ID',
            'creater_id'=>'用户ID',
        ];
    }
    public function rules() {
        return [
            [['customer_name','name','phone','dept_id','creater_id'],'required','message'=>'{attribute}必须被设置'],
        ];
    }

}