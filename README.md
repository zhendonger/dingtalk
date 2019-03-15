MisDing
===================================
###说明###

基于mingyoung/dingtalk钉钉接口的开发，进行MIS业务功能的应用和增加

###项目结构：###
```
config
    config/              配置文件
    params/              参数配置
controllers
    Controller/          继承rest\Controller,初始化
    DingController/      对钉钉接口的主要封装
models
    Assess/              评估画像验证模型
    CarePlan/            照护方案验证模型
    CustomerHome/        客户入驻验证模型
    Medical/             体检报告验证模型
    NurseHome/           护理员入户验证模型
    Reserve/             参观预约验证模型
models
    DingService/         调用钉钉的service
web
    index.php            入口文件

.gitignore               git提交忽略项
composer.json            
composer.lock
```