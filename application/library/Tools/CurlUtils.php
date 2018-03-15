<?php

/**
* cURL请求工具类
 *
 *
 * $curl = new CurlUtils("https://api-cn.faceplusplus.com/facepp/v3/detect");//创建curl对象
 * $value = ['api_key'=>'4Y7GS2sAPGEl-BtQlNw5Iqtq5jGOn87z','api_secret'=>'oQnwwJhS2mcm4vflKvgm972up9sLN8zj','image_url'=>'http://avatar.csdn.net/9/7/5/1_baochao95.jpg','return_attributes'=>'gender,age,glass'];//准备post的值
 * echo $curl->post($value);//发送请求
*/
namespace Tools;
class CurlUtils {

    private $ch;//curl资源对象

    /**
    * 构造方法
    * @param string $url 请求的地址
    * @param int $responseHeader 是否需要响应头信息
    */
    public function __construct($url,$responseHeader = 0){
        $this->ch = curl_init($url);
        curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,1);//设置以文件流的形式返回
        curl_setopt($this->ch,CURLOPT_HEADER,$responseHeader);//设置响应头信息是否返回
    }

    /**
    * 添加请求头
    * @param array $value 请求头
    */
    public function addHeader($value){
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $value);
    }

    /**
    * 发送请求
    * @return string 返回的数据
    */
    private function exec(){
        return curl_exec($this->ch);
    }

    /**
    * 发送get请求
    * @return string 请求返回的数据
    */
    public function get(){
        return $this->exec();
    }

    /**
    * 发送post请求
    * @param  arr/string $value 准备发送post的数据
    * @param boolean $https 是否为https请求
    * @return string        请求返回的数据
    */
    public function post($value,$https=true){
        if($https){
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($this->ch,CURLOPT_POST,1);//设置post请求
        curl_setopt($this->ch,CURLOPT_POSTFIELDS,$value);
        return $this->exec();
    }

    /**
    * 关闭curl句柄
    */
    private function close(){
        curl_close($this->ch);
    }

    /**
     * 析构方法
     */
    public function __destruct(){
        $this->close();
    }


}