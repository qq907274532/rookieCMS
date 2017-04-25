<?php

    namespace Manager\Controller;
    use Common\Model\RegisterSettingModel;
    use Common\Model\UserRankModel;

    class CommonController extends AdminBaseController
    {
        public function __construct() {
            parent::__construct();
        }
        /**
         * 设置是否是特殊会员
         */
        public function specialRank()
        {
            $userRankModel= new UserRankModel();
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == UserRankModel::IS_SPECIAL_RANK ? UserRankModel::IS_SPECIAL_RANK : UserRankModel::IS_NOT_SPECIAL_RANK;
            if (!$userRankModel->where(array('rank_id' => $id))->save(array('special_rank' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }

        /**
         * 是否显示价格
         */
        public function showPrice()
        {
            $userRankModel= new UserRankModel();
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == UserRankModel::IS_SHOW_PRICE ? UserRankModel::IS_SHOW_PRICE : UserRankModel::IS_NOT_SHOW_PRICE;
            if (!$userRankModel->where(array('rank_id' => $id))->save(array('show_price' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }
        /**
         * 是否是显示
         */
        public function showSetting()
        {
            $registerSettingModel= new RegisterSettingModel();
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == RegisterSettingModel::IS_SHOW ? RegisterSettingModel::IS_SHOW : RegisterSettingModel::IS_NOT_SHOW;
            if (!$registerSettingModel->where(array('id' => $id))->save(array('is_show' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }
        /**
         * 是否是必填项
         */
        public function must()
        {
            $registerSettingModel= new RegisterSettingModel();
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == RegisterSettingModel::IS_MUST ? RegisterSettingModel::IS_MUST : RegisterSettingModel::IS_NOT_MUST;
            if (!$registerSettingModel->where(array('id' => $id))->save(array('is_must' => $status))) {
                $this->ajaxReturn(array('error' => self::ERROR_NUMBER, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => self::SUCCESS_NUMBER, 'message' => '操作成功'));
        }
    }