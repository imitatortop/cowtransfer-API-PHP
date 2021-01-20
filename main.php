<?php
/**
 *      需要登录的模块
 *      存储大小:   cowtransfer::info()     
 *      查看根目录: cowtransfer::TableOfContents()  
 * 
 *      无需登录的模块
 *      下载:      cowtransfer::Download_file('guid') 
 */

include "./cowtransfer_API.php";
use cowtransfer_API\cowtransfer;

/**
 *      new 实例
 */
    $cowtransfer = new cowtransfer();
    $cowtransfer->Login("433972421@qq.com","12345678");
    $cowtransfer->info();
    $cowtransfer->TableOfContents();
    $cowtransfer->Download_file("6d346560-7e40-43ac-b327-cb83a781e7a7");


/**
 *      静态  cowtransfer::
 */
    cowtransfer::Login("433972421@qq.com","12345678");
    cowtransfer::info();
    cowtransfer::TableOfContents();
    cowtransfer::Download_file("6d346560-7e40-43ac-b327-cb83a781e7a7");

?>
