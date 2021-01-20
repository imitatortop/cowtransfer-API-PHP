# cowtransfer-API

奶牛快传 API PHP


```php
/**
 *      需要登录的模块
 *      存储大小:   cowtransfer::info()     
 *      查看根目录: cowtransfer::TableOfContents()  
 * 
 *      无需登录的模块
 *      下载:      cowtransfer::Download_file('guid') 
 *
 *      【☢后续更新中☢】
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
    $cowtransfer->Download_file("1d9e2796-df68-4ce4-a43d-5e8454814445");


/**
 *      静态  cowtransfer::
 */
    cowtransfer::Login("433972421@qq.com","12345678");
    cowtransfer::info();
    cowtransfer::TableOfContents();
    cowtransfer::Download_file("1d9e2796-df68-4ce4-a43d-5e8454814445");
```
