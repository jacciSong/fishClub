<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 菜单操作model
 */
class MenuInfoModel extends BaseModel{

	/**
	 * 删除数据
	 * @param	array	$map	where语句数组形式
	 * @return	boolean			操作是否成功
	 */
	public function deleteData($map){
		$count=$this
			->where(array('pid'=>$map['id']))
			->count();
		if($count!=0){
			return false;
		}
		$this->where(array($map))->delete();
		return true;
	}

	/**
	 * 获取全部菜单
	 * @param  string $type tree获取树形结构 level获取层级结构
	 * @return array       	结构数据
	 */
	public function getTreeData($type='tree',$order=''){
		// 判断是否需要排序
		if(empty($order)){
			$data=$this->select();
		}else{
//			var_dump($order);return;
			$data=$this->order(array('order'=>'asc'))->select();
		}
		// 获取树形或者结构数据
		if($type=='tree'){
			$data=\Org\Nx\Data::tree($data,'name','id','pid');
		}else if($type="level"){
			$data=\Org\Nx\Data::channelLevel($data,0,'&nbsp;','id');
			// 显示有权限的菜单
			$auth=new \Think\Auth();
			foreach ($data as $k => $v) {
					foreach ($v['_data'] as $m => $n) {
						if(!$auth->check($n['mca'],session(C('ADMIN_SESSION')))){/*$_SESSION['user']['id']*/
							unset($data[$k]['_data'][$m]);
						}
					}
			}
		}
		// p($data);die;
		return $data;
	}


}
