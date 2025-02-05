<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 权限规则model
 */
class EmployeeIdentityInfoModel extends BaseModel{

	/**
	 * 根据group_id获取全部用户id
	 * @param  int $group_id 用户组id
	 * @return array         用户数组
	 */
	public function getUidsByGroupId($group_id){
		$user_ids=$this
			->where(array('group_id'=>$group_id))
			->getField('uid',true);
		return $user_ids;
	}

	/**
	 * 获取管理员权限列表
	 */
	public function getAllData(){
		$data=$this
			->field('u.id,u.account,u.name,aga.group_id,ag.name')
			->alias('aga')
			->join('__Employee_Info__ u ON aga.uid=u.id','RIGHT')
			->join('__AUTH_GROUP__ ag ON aga.group_id=ag.id','LEFT')
			->select();
		// 获取第一条数据
		$first=$data[0];
		$first['name']=array();
		$user_data[$first['id']]=$first;
		// 组合数组
		foreach ($data as $k => $v) {
			foreach ($user_data as $m => $n) {
				$uids=array_map(function($a){return $a['id'];}, $user_data);
				if (!in_array($v['id'], $uids)) {
					$v['name']=array();
					$user_data[$v['id']]=$v;
				}
			}
		}
		// 组合管理员title数组
		foreach ($user_data as $k => $v) {
			foreach ($data as $m => $n) {
				if ($n['id']==$k) {
					$user_data[$k]['name'][]=$n['name'];
				}
			}
			$user_data[$k]['name']=implode('、', $user_data[$k]['name']);
		}
		// 管理组title数组用顿号连接
		return $user_data;

	}


}
