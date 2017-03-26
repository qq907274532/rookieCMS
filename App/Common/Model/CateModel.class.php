<?php
namespace Common\Model;
use Think\Model;
/*****
 *		Node模型
 *		editor	wxy
 *		date		2015-5-6 13:34:57
 *****/
class CateModel extends Model {
	const STATUS_ENABLE="1";
	const STATUS_DISABLE="0";
	public static $STATUS_MAP=array(
		self::STATUS_ENABLE=>'启用',
		self::STATUS_DISABLE=>'禁用',
		);
	protected $_validate = array(
      array('cate','require','分类名称必须填写'), 
    
   );

    /**
     * 获取分类列表
     * @param array $where   //where条件
     * @param array $order    //排序
     * @return mixed
     */
	public function getCateList($order=[],$where=[]){
	    return $this->where($where)->order($order)->select();
    }

    /**
     * 查询一条
     * @param $id  //id
     * @return mixed
     */
    public function getCateInfoById($id){
	    return $this->where(['id'=>$id])->find();
    }
}
?>