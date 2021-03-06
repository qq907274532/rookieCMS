<?php
namespace Common\Model;
use Think\Model;
/*****
 *		友情链接模型
 *		editor	wxy
 *		date		2015-5-6 13:34:57
 *****/
class ArticleModel extends Model {
	const STATUS_ENABLE='1';
	const STATUS_DISABLE='2';
	const STATUS_TOP_ENABLE='1';
	const STATUS_TOP_DISABLE='2';
	protected $_validate = array(
      array('title','require','文章标题必须填写'), 
      array('description','require','文章描述必须填写'),
      array('content','require','文章内容必须填写'), 
    
   );

    /**
     * 获取文章信息
     * @param $id
     * @return mixed
     */
	public function getArticleInfoById($id){
	    return $this->where(['article_id'=>$id])->find();
    }
}
?>