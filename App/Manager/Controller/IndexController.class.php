<?php
    namespace Manager\Controller;

    class IndexController extends AdminBaseController
    {
        public function index()
        {
            $this->assign('title','首页');
            $this->display();
        }
    }