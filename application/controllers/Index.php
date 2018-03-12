<?php

class IndexController extends BaseController {

    private $_layout;

    public function init(){
//        parent::init();
        //使用layout页面布局
//        $this->_layout = new LayoutPlugin('layout.html', APP_PATH . '/views/layout/');
        $this->_config = Yaf\Registry::get('config');
        $this->_req = $this->getRequest();
    }

    /*首页展示*/
    public function IndexAction()
    {
        if($this->_req->isXmlHttpRequest()){
            //获取post提交的参数
            $name = $this->_req->getPost('usrname');
            $pwd = $this->_req->getPost('pwd');
//            $Admin = new AdminModel();
//            echo '<pre>';
//            var_dump($Admin->where('username', $name)->where('password', MD5($pwd))->first());
//            die;

            if(! AdminModel::where('username', $name)->where('password', MD5($pwd))->first() ){
                exit("101:用户名或密码错误!");
            }
//			$this->_session->set('username',$name);
            $_SESSION['username'] = $name;
            exit("100:登录成功！");
        }

    }

    /*用户登录*/
    public function LogoutAction()
    {
//		$this->_session->__unset('username');
		$_SESSION['username'] = null;
        header('Location:/index/');
    }
}
