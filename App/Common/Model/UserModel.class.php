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


    }

    ?>