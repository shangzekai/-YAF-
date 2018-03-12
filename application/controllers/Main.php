<?php
class MainController extends BaseController {
    private $_layout;

    public function init(){
		parent::init();
        $this->_layout = new LayoutPlugin('layout.html', APP_PATH . '/views/');
        $this->dispatcher = Yaf\Registry::get("dispatcher");
        $this->dispatcher->registerPlugin($this->_layout);
    }

    public function indexAction()
    {

    }
}

