<?php

    namespace Manager\Controller;

    use Common\Model\CateModel;

    class CateController extends AdminBaseController
    {
        private $model;

        public function __construct()
        {
            parent::__construct();
            $this->model = new CateModel();
        }

        public function index()
        {
            $list = $this->model->getCateList(['sort', 'id' => 'desc']);
            foreach ($list as $k => $v) {
                $list[$k]['statusName'] = CateModel::$STATUS_MAP[$v['status']];
            }
            $this->assign('list', node_merges($list));
            $this->display();
        }

        public function add()
        {
            if (IS_POST) {
                $data = I('post.');
                $data['status']=CateModel::STATUS_ENABLE;
                $data['create_time']=date('Y-m-d H:i:s');
                if (!$this->model->create($data)) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'msg' => $this->model->getError()));
                } else {
                    if (!$this->model->add()) {
                        $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'msg' => '添加失败'));
                    }
                    $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'msg' => '添加成功'));
                }
            } else {
                $list = $this->model->getCateList(['sort', 'id' => 'desc'], ['status' => CateModel::STATUS_ENABLE]);
                $this->assign('list', node_merges($list));
                $this->display();
            }
        }
        public function edit(){
            $id=I('id');
            if(IS_POST){
                $data=I('post.');
                if (!$this->model->create($data)) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'msg' => $this->model->getError()));
                } else {
                    if (!$this->model->save()) {
                        $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'msg' => '修改失败'));
                    }
                    $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'msg' => '修改成功'));
                }

            }else{
                if ($id <= 0) {
                    $this->error("不合法请求", U('Cate/index'));
                }
                $info=$this->model->getCateInfoById($id);
                $list = $this->model->getCateList(['sort', 'id' => 'desc'], ['status' => CateModel::STATUS_ENABLE]);
                $this->assign('list', node_merges($list));
                $this->assign('info', $info);
                $this->display();
            }
        }
        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "数据格式有误"));
            }
            $result = $this->model->where(array('pid' => $id))->select();
            if (!empty($result)) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "该分类下面有子类。请先删除子类"));
            }
            $status = intval(I('status', 0, 'intval')) == CateModel::STATUS_ENABLE ? CateModel::STATUS_DISABLE : CateModel::STATUS_ENABLE;
            if (!$this->model->where(array('id' => $id))->save(array('status' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }
    }