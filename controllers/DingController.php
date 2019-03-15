<?php
/**
 * Created by PhpStorm.
 * User: tianzhendong
 * Date: 2019/3/13
 * Time: 4:27 PM
 */
namespace micro\controllers;

use micro\models\Assess;
use micro\models\CarePlan;
use micro\models\CustomerHome;
use micro\models\Medical;
use micro\models\NurseHome;
use micro\models\Reserve;
use micro\service\DingService;
use Yii;
use \EasyDingTalk\Kernel\Exceptions\Exception as MyException;

class DingController extends Controller
{
    /**
     * 由授权码code获取用户信息
     * @return false|string
     */
    public function actionGetUserinfo()
    {
        try {
            if(!$code = Yii::$app->request->get('code')){
                throw new MyException("获取临时授权码失败！",422);
            }

            $res = $this->app->user->getUserInfo($code);
            if ($res['errcode'] !== 0) {

                throw new MyException($res['errmsg'],$res['errcode']);
            }

            $userinfo = $this->app->user->get($res['userid']);
            if ($userinfo['errcode'] !== 0) {

                throw new MyException($userinfo['errmsg'],$userinfo['errcode']);
            }

            return json_encode($userinfo);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }

    /**
     * 获取部门列表
     * @return false|string
     */
    public function actionGetDeptList()
    {
        try {
            $res = $this->app->department->list();

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 获取部门详情
     * @return false|string
     */
    public function actionGetDeptDetail()
    {
        try {
            if(!$id = Yii::$app->request->get('dept_id')){
                throw new MyException("获取部门id失败！",422);
            }

            $res = $this->app->department->get($id);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 发起参观预约审批
     * @return false|string
     */
    public function actionProcessReserve(){
        try {
            if(!$data = Yii::$app->request->post()){
                throw new MyException("获取数据！",422);
            }

            $medical = new Reserve();
            if (!$medical->load(['Reserve' => $data]) || !$medical->validate()) {

                throw new MyException(current($medical->errors)[0],422);
            }

            $data = DingService::setReserveData($data);
            $res = $this->app->process->create($data);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 发起体检报告审批
     * @return false|string
     */
    public function actionProcessMedical(){
        try {
            if(!$data = Yii::$app->request->post()){
                throw new MyException("获取数据！",422);
            }

            $medical = new Medical();
            if (!$medical->load(['Medical' => $data]) || !$medical->validate()) {

                throw new MyException(current($medical->errors)[0],422);
            }

            $data = DingService::setMedicalData($data);
            $res = $this->app->process->create($data);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 发起评估画像审批
     * @return false|string
     */
    public function actionProcessAssess(){
        try {
            if(!$data = Yii::$app->request->post()){
                throw new MyException("获取数据失败！",422);
            }

            $medical = new Assess();
            if (!$medical->load(['Assess' => $data]) || !$medical->validate()) {

                throw new MyException(current($medical->errors)[0],422);
            }

            $data = DingService::setAssessData($data);
            $res = $this->app->process->create($data);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 发起照护方案审批
     * @return false|string
     */
    public function actionCarePlan(){
        try {
            if(!$data = Yii::$app->request->post()){
                throw new MyException("获取数据失败！",422);
            }

            $medical = new CarePlan();
            if (!$medical->load(['CarePlan' => $data]) || !$medical->validate()) {

                throw new MyException(current($medical->errors)[0],422);
            }

            $data = DingService::setCarePlanData($data);
            $res = $this->app->process->create($data);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 发起护理员入户审批
     * @return false|string
     */
    public function actionNurseHome(){
        try {
            if(!$data = Yii::$app->request->post()){
                throw new MyException("获取数据失败！",422);
            }

            $medical = new NurseHome();
            if (!$medical->load(['NurseHome' => $data]) || !$medical->validate()) {

                throw new MyException(reset($medical->errors)[0],422);
            }

            $data = DingService::setCustomerHomeData($data);
            $res = $this->app->process->create($data);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 发起客户入驻审批
     * @return false|string
     */
    public function actionCustomerHome(){
        try {
            if(!$data = Yii::$app->request->post()){
                throw new MyException("获取数据失败！",422);
            }

            $medical = new CustomerHome();
            if (!$medical->load(['CustomerHome' => $data]) || !$medical->validate()) {

                throw new MyException(reset($medical->errors)[0],422);
            }

            $data = DingService::setCustomerHomeData($data);
            $res = $this->app->process->create($data);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
    /**
     * 获取审批详情
     * @return false|string
     */
    public function actionProcessInfo(){
        try {
            if(!$id = Yii::$app->request->get('process_id')){
                throw new MyException("获取部门id失败！",422);
            }

            $res = $this->app->process->get($id);

            if ($res['errcode'] !== 0) {
                throw new MyException($res['errmsg'],$res['errcode']);
            }

            return json_encode($res);

        }catch (MyException $e){

            return json_encode(['errcode'=>$e->getCode(),'errmsg'=>$e->getMessage()]);
        }
    }
}