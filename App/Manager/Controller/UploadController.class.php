<?php
    namespace Manager\Controller;

    use Think\Controller;

    class UploadController extends Controller
    {

        /**
         * 上传公共方法
         */
        public function index()
        {
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->saveName = array('date', 'YmdHis' . rand(100000, 999999));
            $upload->subName = array('date', 'Ymd'); //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            // 上传文件
            $info = $upload->upload();
           
            if (!$info) {
                echo json_encode(array('error' => 100, 'message' => $upload->getError()));
            } else {
                $path = $upload->rootPath . $info['imgPath']['savepath'] . $info['imgPath']['savename'];
                $path = ltrim($path, '.');
                echo json_encode(array('error' => 200, 'message' => "上传成功", 'image' => $path));
            }
            die;
        }

    }