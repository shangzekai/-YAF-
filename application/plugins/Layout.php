<?php
class LayoutPlugin extends Yaf\Plugin_Abstract {

    private $_layoutDir;
    private $_layoutFile;
    private $_layoutVars = array();

    public function __construct($layoutFile, $layoutDir=null){
        $this->_layoutFile = $layoutFile;
        $this->_layoutDir = ($layoutDir) ? $layoutDir : APP_PATH.'/views/';
    }

    public function  __set($name, $value) {
        $this->_layoutVars[$name] = $value;
    }



    public function dispatchLoopStartup ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){

    }

    public function postDispatch ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){

    }

    public function preDispatch ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){
//        /* get the body of the response */
//        $body = $response->getBody();
//        /*clear existing response*/
//        $response->clearBody();
//
//        /* wrap it in the layout */
//        $layout = new Yaf\View\Simple($this->_layoutDir);
//
////        $layout->content = $body;
//
//        $layout->assign('layout', $this->_layoutVars);
//        $layout->assign('content', $body);
////        /* set the response to use the wrapped version of the content */
//        $response->setBody($layout->render($this->_layoutFile));
    }

    public function preResponse ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){
    }

    public function routerShutdown ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){

    }

    public function routerStartup ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){

    }

    public function dispatchLoopShutdown ( Yaf\Request_Abstract $request , Yaf\Response_Abstract $response ){
        /* get the body of the response */
        $body = $response->getBody();
        /*clear existing response*/
        $response->clearBody();

        /* wrap it in the layout */
        $layout = new Yaf\View\Simple($this->_layoutDir);

//        $layout->content = $body;

        $layout->assign('layout', $this->_layoutVars);
        $layout->assign('content', $body);
//        /* set the response to use the wrapped version of the content */
        $response->setBody($layout->render($this->_layoutFile));
    }
}
