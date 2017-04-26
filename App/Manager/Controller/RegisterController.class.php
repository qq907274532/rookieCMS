<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2017/4/25
     * Time: 22:49
     */

    namespace Manager\Controller;


    use Common\Model\RegisterSettingModel;

    class RegisterController extends AdminBaseController
    {
        private $model;
        public function __construct() {
            parent::__construct();
            $this->model= new RegisterSettingModel();
        }
        public function index(){
            $data=$this->page_com($this->model);
            foreach ($data['list'] as $k =>$v){
                $data['list'][$k]['isShowName']=RegisterSettingModel::$SHOW_MAP[$v['is_show']];
                $data['list'][$k]['isMustName']=RegisterSettingModel::$MUST_MAP[$v['is_must']];
                $data['list'][$k]['statusName']=RegisterSettingModel::$STATUS_MAP[$v['status']];
            }
            
            $this->assign('data',$data);
            $this->assign('title','注册项列表');
            $this->display();
        }
        public function add(){
            if(IS_POST){
               $data=I('post.');
               $data['create_time']=date('Y-m-d H:i:s');
               $data['status']=RegisterSettingModel::STATUS_ENABLE;
               if(!$this->model->create($data)){
                   $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => $this->model->getError()));
               }
               if(!$this->model->add()){
                   $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '添加失败'));
               }
                $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '添加成功'));
            }else{
                $this->assign('title','添加注册项');
                $this->assign('show',RegisterSettingModel::$SHOW_MAP);
                $this->assign('must',RegisterSettingModel::$MUST_MAP);
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
                if(!$this->model->updateInfo($id,$data)){
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '修改失败'));
                }
                $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '修改成功'));
            }else{
                if ($id <= 0) {
                    $this->error("不合法请求", U('Register/index'));
                }
                $this->assign('info',$this->model->getInfo($id));
                $this->assign('title','修改注册项');
                $this->assign('show',RegisterSettingModel::$SHOW_MAP);
                $this->assign('must',RegisterSettingModel::$MUST_MAP);
                $this->display();
            }
        }
        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => 100, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == RegisterSettingModel::STATUS_ENABLE ? RegisterSettingModel::STATUS_DISABLE : RegisterSettingModel::STATUS_ENABLE;
            if (!$this->model->where(array('id' => $id))->save(array('status' => $status))) {
                $this->ajaxReturn(array('error' => 100, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => 200, 'message' => '操作成功'));
        }
    }