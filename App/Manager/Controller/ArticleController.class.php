<?php

    namespace Manager\Controller;

    use Common\Model\ArticleCateModel;
    use Common\Model\ArticleModel;
    use Manager\Model\AdminUserModel;


    /**
     * 文章控制器
     */
    class ArticleController extends AdminBaseController
    {
        private $model;
        private $articleCateModel;

        public function __construct()
        {
            parent::__construct();
            $this->model = new ArticleModel();
            $this->articleCateModel = new ArticleCateModel();

        }

        public function index()
        {
            $adminModel = new AdminUserModel();
            $title = empty(I('title')) ? '' : I('title');//标题
            $cate_id = empty(I('cate')) ? '' : I('cate');//分类
            $user_id = empty(I('uid')) ? '' : I('uid');//开始时间
            $where['status'] = array('eq', ArticleModel::STATUS_ENABLE);
            if ($title) {
                $where['title'] = array('like', "$title%");
            }
            if ($cate_id) {
                $where['cat_id'] = array('eq', $cate_id);
            }
            if ($user_id) {
                $where['user_id'] = array('eq', $user_id);
            }
            $data = $this->page_com($this->model, array('article_id' => 'desc', 'sort'), $where);
            $uidList = $adminModel->select();
            $cateIdArr = $this->articleCateModel->select();
            $newCateIdArr = array_column($cateIdArr, 'cat_name', 'id');
            $newUidList = array_column($uidList, 'username', 'id');
            foreach ($data['list'] as $k => $v) {
                $data['list'][$k]['cate_name'] = '';
                if (in_array($v['cat_id'], array_keys($newCateIdArr))) {
                    $data['list'][$k]['cate_name'] = $newCateIdArr[$v['cat_id']];
                }
                $data['list'][$k]['userName'] = '';
                if (in_array($v['user_id'], array_keys($newUidList))) {
                    $data['list'][$k]['userName'] = $newUidList[$v['user_id']];
                }
            }
            $this->assign('cate', $this->articleCateModel->where(array('status' => ArticleCateModel::STATUS_ENABLE))->select());
            $this->assign('list', $adminModel->where(array('status' => AdminUserModel::STATUS_ENABLE))->select());
            $this->assign('data', $data);
            $this->display();


        }

        public function add()
        {
            if (IS_POST) {
                $data = I('post.');
                $data['content'] = $_POST['content'];
                if (!is_numeric($data['sort'])) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '排序必须数字'));
                }
                if (($data['cat_id']) <= 0) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '请选择分类'));
                }
                $data['user_id'] = $_SESSION['id'];
                $data['create_time'] = date('Y-m-d H:i:s');
                if (!$this->model->create($data)) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => $this->model->getError()));
                }
                if (!$this->model->add($data)) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '添加失败'));
                }
                $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '添加成功'));
            } else {
                $this->assign('list', node_merges($this->articleCateModel->where(array('status' => ArticleCateModel::STATUS_ENABLE))->select()));
                $this->display();
            }

        }

        public function edit()
        {
            $id = I('id');
            if (IS_POST) {
                $data = I('post.');
                unset($data['id']);
                $data['content'] = $_POST['content'];
                if (!is_numeric($data['sort'])) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '排序必须数字'));
                }
                if ($data['cat_id'] <= 0) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '请选择分类'));
                }
                if (!$this->model->create($data)) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => $this->model->getError()));
                }
                if (!$this->model->where(['article_id' => $id])->save()) {
                    $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '修改失败'));
                }
                $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '修改成功'));
            } else {
                $this->assign('list', node_merges($this->articleCateModel->where(array('status' => ArticleCateModel::STATUS_ENABLE))->select()));
                $this->assign('info', $this->model->getArticleInfoById($id));
                $this->display();
            }

        }

        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "数据格式有误"));
            }
            if (!$this->model->where(array('article_id' => $id))->save(array('status' => ArticleModel::STATUS_DISABLE))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "删除失败"));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => "删除成功"));
        }
    }