<?php
    namespace Manager\Controller;

    use Manager\Model\NavModel;
    use Think\Controller;

    /**
     * 导航栏控制器
     */
    class NavController extends BaseController
    {
        private $model;
        private $order;

        public function _initialize()
        {
            parent::_initialize();
            $this->model = D('nav');
        }

        public function index()
        {
           
            $this->list=node_merge($this->model->where($where)->order(array('sort', 'id' => 'desc'))->select());
            $this->display();
        }

        public function add()
        {
            try {
                if (IS_POST) {
                    if (!is_numeric($data['sort'] = I('sort'))) {
                        throw new \Exception("排序必须是数字");
                    }
                    if (!is_numeric($data['status'] = I('status'))) {
                        throw new \Exception("请选择状态");
                    }
                    $data['name'] = I('name');
                    $data['time'] = time();
                    if (!$this->model->create($data)) {
                        throw new \Exception($this->model->getError());
                    } else {
                        if (!$this->model->add()) {
                            throw new \Exception("添加失败");
                        }
                    }
                    echo json_encode(array('error' => 200, 'message' => '添加成功'));
                } else {
                    $this->list=node_merge($this->model->where($where)->order(array('sort', 'id' => 'desc'))->select());
                    $this->status = NavModel::$STATUS_MAP;
                    $this->display();
                }
            } catch (\Exception $e) {
                echo json_encode(array('error' => 100, 'message' => $e->getMessage()));
                die;
            }
        }

        public function edit()
        {
            try {
                if (($id = I('id', 0, 'intval')) <= 0) {
                    throw new \Exception("操作有误");
                }
                $where['id'] = array('eq', $id);
                if (IS_POST) {
                    if (!is_numeric($data['sort'] = I('sort'))) {
                        throw new \Exception("排序必须是数字");
                    }
                    if (!is_numeric($data['status'] = I('status'))) {
                        throw new \Exception("请选择状态");
                    }
                    $data['name'] = I('name');
                    $data['time'] = time();
                    if (!$this->model->create($data)) {
                        throw new \Exception($this->model->getError());
                    } else {
                        if (!$this->model->where($where)->save($data)) {
                            throw new \Exception("修改失败");
                        }
                    }
                    echo json_encode(array('error' => 200, 'message' => '修改成功'));
                } else {
                    $this->list=node_merge($this->model->where($where)->order(array('sort', 'id' => 'desc'))->select());
                    $this->info = $this->model->where($where)->find();
                    $this->status = NavModel::$STATUS_MAP;
                    $this->display();
                }
            } catch (\Exception $e) {
                echo json_encode(array('error' => 100, 'message' => $e->getMessage()));
                die;
            }
        }

        public function del()
        {
            try {
                if (($id = I('id', 0, 'intval')) <= 0) {
                    throw new \Exception("操作有误");
                }
                $info=$this->model->where(array('pid' => $id))->find();
                if (!empty($info)) {
                    throw new \Exception("该分类下面有子类,请先删除子类");
                } else {
                    if (!$this->model->where(array('id' => $id))->delete()) {
                        throw new \Exception("删除失败");
                    }
                }
                echo json_encode(array('error' => 200, 'message' => "删除成功"));
            } catch (\Exception $e) {
                echo json_encode(array('error' => 100, 'message' => $e->getMessage()));
            }
            die;
        }
    }