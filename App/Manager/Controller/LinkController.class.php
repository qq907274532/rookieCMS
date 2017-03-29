<?php
    namespace Manager\Controller;

    use Think\Controller;

    class LinkController extends BaseController
    {
        private $model;

        public function _initialize()
        {
            parent::_initialize();
            $this->model = D('Link');
        }

        public function index()
        {
            $this->data = $this->page_com($this->model, array('sort', 'id' => 'desc'));
            $this->display();
        }

        public function add()
        {
            try {
                if (IS_POST) {
                    if (!is_numeric($data['sort'] = I('sort'))) {
                        throw new \Exception("排序必须是数字");
                    }
                    if (empty($data['image'] = I('imgUrl'))) {
                        throw new \Exception("图片必须上传");
                    }
                    $data['name'] = I('name');
                    $data['desc'] = I('desc');
                    $data['url'] = I('url');
                    $data['time'] = time();
                    $data['create_time'] = time();
                    if (!$this->model->create($data)) {
                        throw new \Exception($this->model->getError());
                    } else {
                        if (!$this->model->add()) {
                            throw new \Exception('添加失败');
                        }
                    }
                    echo json_encode(array('error' => 200, 'message' => '添加成功'));
                    die;
                }else{
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
                    if (empty($data['image'] = I('imgUrl'))) {
                        throw new \Exception("图片必须上传");
                    }
                    $data['name'] = I('name');
                    $data['desc'] = I('desc');
                    $data['url'] = I('url');
                    $data['create_time'] = time();
                    if (!$this->model->create($data)) {
                        $this->error($this->model->getError());
                    } else {
                        if (!$this->model->where($where)->save()) {
                            throw new \Exception('修改失败');
                        }
                    }
                    echo json_encode(array('error' => 200, 'message' => '修改成功'));
                    die;
                }else{
                  $this->info =$this->model->where($where)->find();
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
                if (!$this->model->where(array('id' => $id))->delete()) {
                    throw new \Exception("删除失败");
                }
                echo json_encode(array('error' => 200, 'message' => "删除成功"));
            } catch (\Exception $e) {
                echo json_encode(array('error' => 100, 'message' => $e->getMessage()));
            }
        }
    }