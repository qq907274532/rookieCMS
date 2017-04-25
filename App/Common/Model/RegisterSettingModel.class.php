<?php
    namespace Common\Model;

    use Think\Model;

    /*****
     *        文章模型
     *        editor    zhangxin
     *        date        2015-5-6 13:34:57
     *****/
    class RegisterSettingModel extends Model
    {

        const STATUS_ENABLE  = 1;
        const STATUS_DISABLE = 2;
        const IS_SHOW=1;
        const IS_NOT_SHOW=2;
        const IS_MUST=1;
        const IS_NOT_MUST=2;
        public static  $MUST_MAP=[
            self::IS_MUST=>'是',
            self::IS_NOT_MUST=>'否'
        ];
        public static $SHOW_MAP=[
            self::IS_SHOW=>'是',
            self::IS_NOT_SHOW=>'否',
        ];
        public static $STATUS_MAP = array(
            self::STATUS_ENABLE => '启用',
            self::STATUS_DISABLE => '禁用',
        );
        protected $_validate = array(
            array('name','require','注册项名称必须填写'),
            array('sort','require','排序必须填写'),

        );

        /**
         * @param $id
         * @return mixed
         */
        public function getInfo($id)
        {
            $info = $this->where(['id' => $id])->find();
            return $info;
        }

        public function updateInfo($id,$data){
            return $this->where(['id'=>$id])->save($data);
        }

    }

    ?>