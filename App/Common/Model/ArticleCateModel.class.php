<?php
namespace Common\Model;
use Think\Model;
/*****
 *		Node模型
 *		editor	wxy
 *		date		2015-5-6 13:34:57
 *****/
class ArticleCateModel extends Model {
	const STATUS_ENABLE="1";
	const STATUS_DISABLE="0";
	const CATE_TYPE_ORDINARY=1;//普通
	const CATE_TYPE_SYSTEM=2;//系统
	const CATE_TYPE_SHOP_INFORMATION=3;//网店信息
	const CATE_TYPE_HELP_SORT=4;//帮助分类
	const CATE_TYPE_ONLINE_HELP=5;//网店帮助
    public static $TYPE_MAP=[
        self::CATE_TYPE_ORDINARY=>'普通分类' ,
        self::CATE_TYPE_SYSTEM=>'系统分类' ,
        self::CATE_TYPE_SHOP_INFORMATION=>'网店信息' ,
        self::CATE_TYPE_HELP_SORT=>'帮助分类' ,
        self::CATE_TYPE_ONLINE_HELP=>'网店帮助' ,
    ];
	public static $STATUS_MAP=array(
		self::STATUS_ENABLE=>'启用',
		self::STATUS_DISABLE=>'禁用',
		);
	protected $_validate = array(
      array('cat_name','require','分类名称必须填写'),
    
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