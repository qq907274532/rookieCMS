<?php
    namespace Common\Model;

    use Think\Model;

    /*****
     *        文章模型
     *        editor    zhangxin
     *        date        2015-5-6 13:34:57
     *****/
    class UserModel extends Model
    {

        const STATUS_ENABLE  = 1;
        const STATUS_DISABLE = 0;
        public static $STATUS_MAP = array(
            self::STATUS_ENABLE => '启用',
            self::STATUS_DISABLE => '禁用',
        );

        /**
         * @param $username
         * @return mixed
         */
        public function getUserInfoByUserName($username)
        {
            $info = $this->where(['username' => $username])->find();
            return $info;
        }

        /**
         * @param $uid
         * @return mixed
         */
        public function getUserInfoByUserId($uid)
        {
            $info = $this->where(['user_id' => $uid])->getField('username');
            return $info;
        }

        public function getUserListByWhere($where = [], $order = ['user_id' => 'desc'])
        {
            return $this->where($where)->order($order)->select();
        }

    }

    ?>