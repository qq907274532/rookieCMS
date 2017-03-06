<?php
    namespace Manager\Controller;

    use Common\Model\UserModel;

    class UserController extends AdminBaseController
    {
        private $model;
        private $order;
        

        public function __construct()
        {
            parent::__construct();
            $this->model = new UserModel();
        }

        public function index()
        {
            
            $this->order = array('create_time', 'user_id' => 'desc');
            $data = $this->page_com($this->model, $this->order);
            foreach ($data['list'] as $k => $v) {
                $data['list'][$k]['statusName'] = UserModel::$STATUS_MAP[$v['status']];
            }
          
            $this->assign('data',$data);
            $this->display();
        }

      
        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => 100, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == UserModel::STATUS_ENABLE ? UserModel::STATUS_DISABLE : UserModel::STATUS_ENABLE;
            if (!$this->model->where(array('user_id' => $id))->save(array('status' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }
    }