<?php
/**
 * Created by PhpStorm.
 * User: tianzhendong
 * Date: 2019/3/14
 * Time: 2:55 PM
 */
namespace micro\service;

use Yii;
use yii\base\Exception;

class DingService
{
    /**
     * 设置体检报告审批数据
     * @param array $data
     * @return bool
     */
    public static function setMedicalData(array $data = []){
        try {
            $res_data['process_code'] = \Yii::$app->params['medical_process_code'];
            $res_data['originator_user_id'] = $data['creater_id'];
            $res_data['dept_id'] = $data['dept_id'];

            $customer_name['name'] = "客户姓名";
            $customer_name['value'] = $data['customer_name'] ?? '';
            $customer_age['name'] = "年龄";
            $customer_age['value'] = $data['customer_age'] ?? "";
            $customer_sex['name'] = "性别";
            $customer_sex['value'] = $data['customer_sex'] ?? "";
            $customer_phone['name'] = "联系手机";
            $customer_phone['value'] = $data['customer_phone'] ?? "";
            $customer['name'] = "客户信息";
            $customer['value'] = json_encode([[$customer_name, $customer_age, $customer_sex, $customer_phone]]);

            $form_service_intent['name'] = "服务意向";
            $form_service_intent['value'] = $data['service_intent'] ?? '';
            $form_stage_name['name'] = "意向驿站";
            $form_stage_name['value'] = $data['stage_name'] ?? '';
            $form_physical_url['name'] = "附件";
            $form_physical_url['value'] = [$data['file']] ?? '';
            $form_recuperate_name['name'] = "当前疗养环境";
            $form_recuperate_name['value'] = $data['recuperate_type'] ?? '';
            $form_check_time['name'] = "检查日期";
            $form_check_time['value'] = $data['check_time'] ?? '';
            $form_title['name'] = "标题";
            $form_title['value'] = $data['title'] ?? '';
            $form_describe['name'] = "描述";
            $form_describe['value'] = $data['describe'] ?? '';
            $form_assess['name'] = "评估信息";
            $form_assess['value'] = json_encode([[$form_service_intent, $form_stage_name, $form_physical_url, $form_recuperate_name, $form_check_time, $form_title, $form_describe]]);

            $res_data['form_component_values'] = [$customer, $form_assess];
            return $res_data;
        }catch (Exception $e){
            Yii::warning($e->getMessage());
            return false;
        }
    }
    public static function setAssessData(array $data = [])
    {
        try {
            $res_data['process_code']       = \Yii::$app->params['assess_process_code'];
            $res_data['originator_user_id'] = $data['creater_id'];
            $res_data['dept_id']            = $data['dept_id'];

            $customer_name['name'] = "客户姓名";
            $customer_name['value'] = $data['customer_name'] ?? '';
            $customer_age['name'] = "年龄";
            $customer_age['value'] = $data['customer_age'] ?? "";
            $customer_sex['name'] = "性别";
            $customer_sex['value'] = $data['customer_sex'] ?? "";
            $customer_ethnic['name'] = "民族";
            $customer_ethnic['value'] = $data['customer_ethnic'] ?? '';
            $customer_address['name'] = "家庭住址";
            $customer_address['value'] = $data['customer_address'] ?? '';
            $care_plan['name'] = "医学检查资料";
            $care_plan['value'] = "[点击查看](".$data['file'].")" ?? '';
            $service_intent['name'] = "服务意向";
            $service_intent['value'] = $data['service_intent'] ?? '';
            $recuperate_type['name'] = "当前疗养环境";
            $recuperate_type['value'] = $data['recuperate_type'] ?? '';
            $remark ['name'] = "备注";
            $remark['value'] = $data['remark'] ?? '';
            $assess_number['name'] = "评估编号";
            $assess_number['value'] = $data['assess_number'] ?? '';
            $assess_url['name'] = "评估报告";
            $assess_url['value'] = "[点击查看](".$data['assess_url'].")" ?? '';
            $assess_result['name'] = "评估审批结果";
            $assess_result['value'] = $data['assess_result'] ?? '';
            $customer['name'] = "客户信息";
            $customer['value'] = json_encode([[$customer_name, $customer_age, $customer_sex, $customer_ethnic,$customer_address,$care_plan,$service_intent,$recuperate_type,$remark]]);

            $assess['name'] = "评估信息";
            $assess['value'] = json_encode([[$assess_number, $assess_url, $assess_result]]);

            $res_data['form_component_values'] = [$customer,$assess];
            return $res_data;
        }catch (Exception $e){
            Yii::warning($e->getMessage());
            return false;
        }
    }
    public static function setCarePlanData(array $data = [])
    {
        try {
            $res_data['process_code']       = \Yii::$app->params['careplan_process_code'];
            $res_data['originator_user_id'] = $data['creater_id'];
            $res_data['dept_id']            = $data['dept_id'];

            $customer_name['name'] = "客户姓名";
            $customer_name['value'] = $data['customer_name'] ?? '';
            $customer_age['name'] = "年龄";
            $customer_age['value'] = $data['customer_age'] ?? "";
            $customer_sex['name'] = "性别";
            $customer_sex['value'] = $data['customer_sex'] ?? "";
            $customer_ethnic['name'] = "民族";
            $customer_ethnic['value'] = $data['customer_ethnic'] ?? '';
            $customer_address['name'] = "家庭住址";
            $customer_address['value'] = $data['customer_address'] ?? '';
            $file['name'] = "医学检查资料";
            $file['value'] = isset($data['file']) ? "[点击查看](".$data['file'].")" : '';

            $care_plan_number['name'] = "方案编号";
            $care_plan_number['value'] = $data['care_plan_number'] ?? '';
            $care_plan['name'] = "照护方案";
            $care_plan['value'] = isset($data['care_plan']) ? "[点击查看](".$data['care_plan'].")" : '';
            $care_plan_result['name'] = "方案审批结果";
            $care_plan_result['value'] = $data['care_plan_result'] ?? '';

            $assess_number['name'] = "评估编号";
            $assess_number['value'] = $data['assess_number'] ?? '';
            $assess_url['name'] = "评估报告";
            $assess_url['value'] = isset($data['assess_url']) ? "[点击查看](".$data['assess_url'].")" : '';
            $assess_result['name'] = "评估审批结果";
            $assess_result['value'] = $data['assess_result'] ?? '';
            $service_intent['name'] = "服务意向";
            $service_intent['value'] = $data['service_intent'] ?? '';
            $recuperate_type['name'] = "当前疗养环境";
            $recuperate_type['value'] = $data['recuperate_type'] ?? '';
            $remark ['name'] = "备注";
            $remark['value'] = $data['remark'] ?? '';

            $customer['name'] = "客户信息";
            $customer['value'] = json_encode([[$customer_name, $customer_age, $customer_sex, $customer_ethnic,$customer_address,$file]]);

            $care['name'] = "方案信息";
            $care['value'] = json_encode([[$care_plan_number, $care_plan,$care_plan_result]]);

            $assess['name'] = "评估信息";
            $assess['value'] = json_encode([[$assess_number, $assess_url, $assess_result,$service_intent,$recuperate_type,$remark]]);

            $res_data['form_component_values'] = [$customer,$care,$assess];
            return $res_data;
        }catch (Exception $e){
            Yii::warning($e->getMessage());
            return false;
        }
    }
    public static function setCustomerHomeData(array $data = []){
        $res_data['process_code'] = \Yii::$app->params['customerhome_process_code'];
        $res_data['originator_user_id'] = $data['creater_id'];
        $res_data['dept_id'] = $data['dept_id'];

        $customer_name['name'] = "客户姓名";
        $customer_name['value'] = $data['customer_name'] ?? "";
        $customer_age['name'] = "年龄";
        $customer_age['value'] = $data['customer_age'] ?? "";
        $customer_sex['name'] = "性别";
        $customer_sex['value'] = $data['customer_sex'] ?? "";
        $customer_ethnic['name'] = "民族";
        $customer_ethnic['value'] = $data['customer_ethnic'] ?? "";
        $customer_phone['name'] = "联系手机";
        $customer_phone['value'] = $data['customer_phone'] ?? "";
        $customer['name'] = "客户信息";
        $customer['value'] = json_encode([[$customer_name, $customer_age, $customer_sex, $customer_ethnic, $customer_phone]]);

        $name['name'] = "联系人";
        $name['value'] = $data['name'] ?? "";
        $phone['name'] = "联系电话";
        $phone['value'] = $data['phone'] ?? "";
        $sign_date['name'] = "签约日期";
        $sign_date['value'] = $data['sign_date'] ?? "";
        $home_date['name'] = "入驻时间";
        $home_date['value'] = $data['home_date'] ?? "";
        $stage_name['name'] = "入驻驿站";
        $stage_name['value'] = $data['stage_name'] ?? "";
        $bed_name['name'] = "入驻床位";
        $bed_name['value'] = $data['bed_name'] ?? "";
        $food_type['name'] = "餐饮需求";
        $food_type['value'] = $data['food_type'] ?? "";
        $remark['name'] = "备注";
        $remark['value'] = $data['remark'] ?? "";
        $form_home['name'] = "入住信息";
        $form_home['value'] = json_encode([[$name, $phone, $sign_date, $home_date, $bed_name,$food_type,$remark]]);

        $res_data['form_component_values'] = [$stage_name,$customer,$form_home];
        return $res_data;
    }
    public static function setNurseHomeData(array $data = []){
        $res_data['process_code'] = \Yii::$app->params['nursehome_process_code'];
        $res_data['originator_user_id'] = $data['creater_id'];
        $res_data['dept_id'] = $data['dept_id'];

        $customer_name['name'] = "客户姓名";
        $customer_name['value'] = $data['customer_name'] ?? "";
        $customer_age['name'] = "年龄";
        $customer_age['value'] = $data['customer_age'] ?? "";
        $customer_sex['name'] = "性别";
        $customer_sex['value'] = $data['customer_sex'] ?? "";
        $customer_ethnic['name'] = "民族";
        $customer_ethnic['value'] = $data['customer_ethnic'] ?? "";
        $customer_address['name'] = "家庭住址";
        $customer_address['value']= $data['customer_address'] ?? '';
        $customer['name'] = "客户信息";
        $customer['value'] = json_encode([[$customer_name, $customer_age, $customer_sex, $customer_ethnic, $customer_address]]);

        $name['name'] = "联系人";
        $name['value'] = $data['name'] ?? "";
        $phone['name'] = "联系电话";
        $phone['value'] = $data['phone'] ?? "";
        $sign_date['name'] = "签约日期";
        $sign_date['value'] = $data['sign_date'] ?? "";
        $home_date['name'] = "入户时间";
        $home_date['value'] = $data['home_date'] ?? "";
        $address['name'] = "服务地址";
        $address['value'] = $data['address'] ?? "";
        $nurse_name['name'] = "服务护理员";
        $nurse_name['value'] = $data['nurse_name'] ?? "";
        $remark['name'] = "备注";
        $remark['value'] = $data['remark'] ?? "";
        $form_home['name'] = "入住信息";
        $form_home['value'] = json_encode([[$name, $phone, $sign_date, $home_date, $address,$nurse_name,$remark]]);

        $res_data['form_component_values'] = [$customer,$form_home];
        return $res_data;
    }
    public static function setReserveData(array $data = []){
        $res_data['process_code'] = \Yii::$app->params['reserve_process_code'];
        $res_data['originator_user_id'] = $data['creater_id'];
        $res_data['dept_id'] = $data['dept_id'];

        $customer_name['name'] = "客户姓名";
        $customer_name['value'] = $data['customer_name'] ?? "";
        $customer_age['name'] = "年龄";
        $customer_age['value'] = $data['customer_age'] ?? "";
        $customer_sex['name'] = "性别";
        $customer_sex['value'] = $data['customer_sex'] ?? "";
        $customer_phone['name'] = "联系手机";
        $customer_phone['value']= $data['customer_phone'] ?? '';
        $customer['name'] = "客户信息";
        $customer['value'] = json_encode([[$customer_name, $customer_age, $customer_sex, $customer_phone]]);

        $name['name'] = "参观人";
        $name['value'] = $data['name'] ?? "";
        $phone['name'] = "联系手机";
        $phone['value'] = $data['phone'] ?? "";
        $num['name'] = "参观人数";
        $num['value'] = $data['number'] ?? "";
        $stage_name['name'] = "接待地点";
        $stage_name['value'] = $data['stage_name'] ?? "";
        $remark['name'] = "备注";
        $remark['value'] = $data['remark'] ?? "";
        $form_home['name'] = "参观信息";
        $form_home['value'] = json_encode([[$name, $phone,$num,$remark]]);

        $res_data['form_component_values'] = [$stage_name,$customer,$form_home];
        return $res_data;
    }
}