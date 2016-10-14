<?php

//1.生成缓存 2.获取缓存 3.删除缓存
//$fname@文件名 $value@缓存值 $basedir@缓存路径
//函数使用说明:1.传两个值生成缓存.2.传三个值目录下生成缓存.3.传一个值获取缓存.4.传两个值第二个为null的话就是删除缓存文件
//调用方法:$file=new file,$file->cacheData('值1','值2','值3'); 
class file{
    private $dir;
    const EXT = '.html';//后缀
    public function __construct(){
        $this->dir = dirname(__FILE__);//设置默认缓存存放文件夹
    }//以上已设置文件夹和路径
    public function cacheData($fname,$value="",$basedir=""){
        $filename=$this->dir.'/'.$basedir.'/'.$fname.self::EXT;//全路径下的文件
        if($value !==''){
            if(is_null($value)){//第二个值为空就删除缓存
               return unlink($filename);
            }
            $dir=dirname($filename);//文件目录所在名
            if(!is_dir($dir)){
                mkdir($dir,0777);
            }
            return file_put_contents($filename,$value);
        }
        
        if(!is_file($filename)){
            return false;
        }else{
           return file_get_contents($filename);
        }
    }  
}
