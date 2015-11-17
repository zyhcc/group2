<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RelJob;
use app\models\ContactForm;
use app\database;
header("content-type:text/html;charset=utf-8");
class InfoController extends Controller{
	public $enableCsrfValidation = false;

	public function actionSearch_work(){
		//@$page=$_GET['page']?$_GET['page']:1;
		$page_size=20;
		@$keywords=$_GET['keywords'];
		$sql="select * from rel_job where rj_name like '%$keywords%' limit $page_size";
		$work_info=Yii::$app->db->createCommand($sql)->queryall();
		//print_r($work_info);die;
		if($work_info){
			$arr['code']=200;
			$arr['data']=$work_info;
		}else{
			$arr['code']=100010;
			$arr['msg']="没有查询到职位信息";
		}
		$arr=json_encode($arr);
		exit($arr);
	}
	public function actionAdd_userinfo(){
		@$member_id=$_POST['member_id'];
		if(empty($member_id)){
			$array['code']=100012;
			$array['msg']="添加失败";
			$array=json_encode($array);
			exit($array);
		}
		@$education=$_POST['education'];
		@$work_years=$_POST['work_years'];
		@$phone=$_POST['phone'];
		@$email=$_POST['email'];
		@$city=$_POST['city'];
		$sql="insert into resume (member_id,education,work_years,phone,email,city) values($member_id,'$education','$work_years','$phone','$email','$city')";
		$res=Yii::$app->db->createCommand($sql)->execute();
		if($res){
			$arr['code']=200;
			$arr['msg']="成功";
		}else{
			$arr['code']=100011;
			$arr['msg']="添加失败";
		}
		$arr=json_encode($arr);
		exit($arr);
	}
	public function actionAdd_workexperience(){
		@$member_id=$_POST['member_id'];
		if(empty($member_id)){
			$array['code']=100012;
			$array['msg']="添加失败";
			$array=json_encode($array);
			exit($array);
		}
		@$work_company=$_POST['work_company'];
		@$work_position=$_POST['work_position'];
		
		
		$sql="insert into work_experience (member_id,work_company,work_position) values($member_id,'$work_company','$work_position')";
		$res=Yii::$app->db->createCommand($sql)->execute();
		if($res){
			$arr['code']=200;
			$arr['msg']="成功";
		}else{
			$arr['code']=100011;
			$arr['msg']="添加失败";
		}
		$arr=json_encode($arr);
		exit($arr);
	}
	public function actionAdd_educationexperience(){
		@$member_id=$_POST['member_id'];
		if(empty($member_id)){
			$array['code']=100012;
			$array['msg']="添加失败";
			$array=json_encode($array);
			exit($array);
		}
		@$e_name=$_POST['e_name'];
		@$e_jineng=$_POST['e_jineng'];
		@$e_time_end=$_POST['e_time_end'];
		@$self_desc=$_POST['self_desc'];
		$sql="insert into work_experience (member_id,e_name,e_jineng,e_time_end,self_desc) values($member_id,'$e_name','$e_jineng','$e_time_end','$self_desc')";
		$res=Yii::$app->db->createCommand($sql)->execute();
		if($res){
			$arr['code']=200;
			$arr['msg']="成功";
		}else{
			$arr['code']=100011;
			$arr['msg']="添加失败";
		}
		$arr=json_encode($arr);
		exit($arr);
	}

   
}