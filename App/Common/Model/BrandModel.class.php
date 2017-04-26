<?php

    namespace Common\Model;

    use Think\Model;

    class BrandModel extends Model
    {
        const IS_SHOW        = 1;
        const IS_NOT_SHOW    = 2;
        const STATUS_ENABLE  = 1;
        const STATUS_DISABLE = 2;
        public static $STATUS_MAP = [
            self::IS_SHOW => '是',
            self::IS_NOT_SHOW => '否',
        ];
        public static $SHOW_MAP   = [
            self::IS_SHOW => '是',
            self::IS_NOT_SHOW => '否',
        ];
        protected     $_validate  = array(
            array('brand_name', 'require', '品牌名称必须填写'),

        );

        /**
         * 获取品牌信息
         * @param $id
         * @return mixed
         */
        public function getBrandInfoById($id)
        {
            return $this->where(['brand_id' => $id])->find();
        }

        /**
         * 修改
         * @param $id   //id
         * @param $data  //要修改的数据
         * @return bool
         */
        public function update($id,$data){
            return $this->where(['brand_id' => $id])->save($data);
        }
    }

    ?>