<?php
    namespace cowtransfer_API;
    class cowtransfer{
        private static $header = [
            'Host: cowtransfer.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0',
            'Accept: application/json',
            'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2',
            'Accept-Encoding: gzip, deflate',
            'content-type: application/x-www-form-urlencoded',
            'Origin: https://cowtransfer.com',
            'Connection: close',
            'Referer: https://cowtransfer.com',
            'Cookie: cf-cs-k-20181214=1610272831475; '
        ];
        function Login($user,$passwd){
            $config = [
                'method'=>'POST',
                'url'=>"https://cowtransfer.com/user/emaillogin",
                'body'=>sprintf('email=%s&password=%s',$user,$passwd),
                'login'=>1
            ];
            if (preg_match('/remember-me=(.*?);/is',self::Curl($config),$r))
                self::$header[9] = self::$header[9].";remember-me=".$r[1].';';;
            return $this?($this):(self::$header);
        }

        function info(){
            $config = [
                'method'=>'GET',
                'url'=>"https://cowtransfer.com/space/in/info"
            ];
            return self::Curl($config);
         
        }

        function TableOfContents($guid){
            $config = [
                'method'=>'GET',
                'url'=>sprintf("https://cowtransfer.com//space?guid=%s",$guid?$guid:"")."&page=0&sort=fileName%20asc"
            ];
            return self::Curl($config);
        }

        function Download_file($guid){
            $config_NotLoggedIn = [
                'method'=>'POST',
                'url'=>sprintf("https://cowtransfer.com/transfer/download?guid=%s",$guid)
            ];
            $config_SignIn = [
                'method'=>'GET',
                'url'=>sprintf("https://cowtransfer.com/space/in/file/download?guid=%s",$guid)
            ];
            return self::Curl((strlen(self::$header[9])>40)?$config_SignIn:$config_NotLoggedIn);
        }

        function Download_Bale(){}

        private function Curl($config){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER,self::$header);
            curl_setopt($ch, CURLOPT_URL, $config['url']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, $config['login']);
            if($config['method'] == 'POST'){
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $config['body']);
            }
            curl_setopt($ch, CURLOPT_TIMEOUT,5);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true); 
            $data = curl_exec($ch);
            $res = curl_getinfo($ch, CURLINFO_HEADER_OUT);
            $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
            curl_close($ch);
            return $data;
        }

    }

?>
