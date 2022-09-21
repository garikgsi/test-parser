<?php
 namespace App\Parser;

 use App\Parser\FetchInterface;

 class CurlFetcher implements FetchInterface {

    /**
     * fetch site using Curl
     *
     * @param  string $url
     * @return string
     */
    public function fetch(string $url):string {
            $headers = array(
                'GET ' .$url . ' HTTP/1.1',
                "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                "Accept-Encoding: gzip, deflate",
                "Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7",
                "Host: domofond.ru",
                "Referer: domofond.ru",
                "Upgrade-Insecure-Requests: 1",
                'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
                'Cookie: dfuid=5e0dd723-40e6-46cf-a2f1-1db784e320e1; _ga=GA1.2.140590976.1641893876; rrpvid=42725831313485; rcuid=6166ad1a101fb8000139a8a9; _ym_uid=1641893879540019262; _ym_d=1641893879; __gads=ID=00752b7382f51452:T=1641893879:S=ALNI_ManEsFfeviPUR29VUUnBx_DcgsAxQ; _gid=GA1.2.589118605.1642400326; _ym_visorc=w; _ym_isad=2; cto_bundle=ellcGV9VT0c4Q0Vrd2E3dEhtVmhJNk1Ic20xaHNnNXhuSiUyRiUyQiUyRnZYMlFEV0tnNExTWmhQUjJJVzdUOHdkNmlKdnh1aEZtUWMzQ0dxV25Nb3hrYktOeUpEMjZLZ0xLTFElMkZDekxiSkh6elEyOFM0UHVZZ2xHTklpQ2RJOTRkb1Q3QUNTODRlR0hnU0Z1MEFkeDBtNTc1MVozdjVndyUzRCUzRA'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $urlContent = curl_exec($ch);
            curl_close($ch);
            return $urlContent;
    }
 }