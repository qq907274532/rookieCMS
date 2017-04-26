<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2017/4/26
     * Time: 21:58
     */

    namespace Manager\Controller;


    use Common\Model\BrandModel;

    class BrandController   extends AdminBaseController
    {
       private $model;
       private $sort;
       public function __construct() {
           parent::__construct();
           $this->model= new BrandModel();
       }
       public function index(){
           $this->sort=['brand_id'=>'desc'];
           $data=$this->page_com($this->model,$this->sort);
           foreach ($data['list'] as $k =>$v){
               $data['list'][$k]['statusName']=BrandModel::$STATUS_MAP[$v['status']];
               $data['list'][$k]['isShow']=BrandModel::$SHOW_MAP[$v['is_show']];
           }
           $this->assign('data',$data);
           $this->display();
       }
       public function add(){
           if(IS_POST){
               $data=I('post.');
               $data['create_time']=date('Y-m-d h:i:s');

               if(!$this->model->create($data)){
                   $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => $this->model->getError()));
               }
               if(!$this->model->add()){
                   $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' =>'添加失败'));
               }
               $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' =>'添加成功'));
           }else{
               $this->assign('show',BrandModel::$SHOW_MAP);
               $this->assign('title','增加品牌');
               $this->display();
           }
       }
        public function edit(){
           $id=I('id');
            if(IS_POST){
                if($id<=0){
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' =>'参数不正确'));
                }
                $data=I('post.');
                unset($data['id']);
                if(!$this->model->create($data)){
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => $this->model->getError()));
                }
                if(!$this->model->update($id,$data)){
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' =>'修改失败'));
                }
                $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' =>'修改成功'));
            }else{
                if ($id <= 0) {
                    $this->error("不合法请求", U('brand/index'));
                }
                $this->assign('info',$this->model->getBrandInfoById($id));
                $this->assign('show',BrandModel::$SHOW_MAP);
                $this->assign('title','修改品牌');
                $this->display();
            }
        }
        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => 100, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == BrandModel::STATUS_ENABLE ? BrandModel::STATUS_DISABLE : BrandModel::STATUS_ENABLE;
            if (!$this->model->where(array('brand_id' => $id))->save(array('status' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }
    }