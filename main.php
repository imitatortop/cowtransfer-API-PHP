<?php
/**
 *      两种方式    (new 实例)和  (静态 cowtransfer:: )
 */
    include './cowtransfer_API.php';
    use cowtransfer_API\cowtransfer;
    
    /**
     *  new 实例
     */
    $cowtransfer = new cowtransfer(); 

    //登录 并 查询 存储大小          账户                 密码
    // echo $cowtransfer->Login("430272991@qq.com","12345678")->info();  
    $cowtransfer->Login("430272991@qq.com","12345678");
    echo $cowtransfer->info();

    echo '<hr>';

    //查看 目录 文件
    // 参数为空：为 根目录 ；参数为目录guid
    echo $cowtransfer->TableOfContents();   //根目录
    // echo $cowtransfer->TableOfContents(guid);

    // echo '<hr>';

    //下载文件 [ 暂时有问题 命名空间 无法获取 登录参数 ]
    echo $cowtransfer->Download_file("761df23e-b3da-4a75-b1e4-43f485874978");

/******************************************************************************************* */
/**
 *      静态方法 cowtransfer::
 */
    cowtransfer::Download_file("761df23e-b3da-4a75-b1e4-43f485874978");

?>
