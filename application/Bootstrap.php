<?php
class Bootstrap extends Yaf\Bootstrap_Abstract {
    private $_config;

    /**
     * [初始化 配置信息]
     * @return [type] [description]
     */
    public function _initBootstrap() {
        $this->_config = Yaf\Application::app()->getConfig();
        Yaf\Registry::set('config', $this->_config);
    }

    /**
     * [加载 命名空间 加载local library components文件]
     * @return [type] [description]
     */
    public function _initRegisterLocalNamespace()
    {
        $loader = Yaf\Loader::getInstance();
        $loader->registerLocalNamespace(
            array('Helper','Error', 'Db')
        );
    }

    /**
     * [默认视图类(报错已用)]
     * @param  Yaf\Dispatcher $dispatcher [description]
     * @return [type]                     [description]
     */
    public function _initView(Yaf\Dispatcher $dispatcher) {
//        $dispatcher->setView(new View(null));
    }
    /**
     * [错误处理]
     * @return [type] [description]
     */
    public function _initErrors() {
        //报错是否开启
        if ($this->_config->application->showErrors) {
            error_reporting(-1);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(0);
            ini_set('display_errors', 'Off');
        }
        set_error_handler(['Error', 'errorHandler']);
    }
    /**
     * [路由设置]
     */
    public function _initRoutes(Yaf\Dispatcher $dispatcher) {
//        $router = $dispatcher->getRouter();
//        $router->addConfig(Yaf\Registry::get('config')->routes);
//        Yaf\Loader::import(APP_CONFIG . '/route.php');
//        $router->addConfig($routeConfigs);
    }
    /**
     * layout页面布局
     */
    public function _initLayout(Yaf\Dispatcher $dispatcher) {
        Yaf\Registry::set('dispatcher', $dispatcher);
    }
}
