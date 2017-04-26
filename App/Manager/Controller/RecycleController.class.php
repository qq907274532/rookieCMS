<?php

    namespace Manager\Controller;

    use Common\Model\ArticleCateModel;
    use Common\Model\ArticleModel;
    use Manager\Model\AdminUserModel;

    /**
     * 回收站控制器
     */
    class RecycleController extends AdminBaseController
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
            $where['status'] = array('eq', ArticleModel::STATUS_DISABLE);
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
            $this->assign('title','回收站列表');
            $this->assign('cate', $this->articleCateModel->where(array('status' => ArticleCateModel::STATUS_ENABLE))->select());
            $this->assign('list', $adminModel->where(array('status' => AdminUserModel::STATUS_ENABLE))->select());
            $this->assign('data', $data);
            $this->display();


        }

        public function restore()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "操作有误"));
            }
            if (!$this->model->where(['article_id' => $id])->save(array('status' => ArticleModel::STATUS_ENABLE))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "恢复失败"));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => "恢复成功"));
        }

        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "操作有误"));
            }
            if (!$this->model->where(['article_id' => $id])->delete()) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "删除失败"));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => "删除成功"));

        }
    }