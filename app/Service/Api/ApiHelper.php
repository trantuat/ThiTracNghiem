<?php
    namespace App\Service\Api;
    use App\Service\Api\ResponseData;
    use App\Service\Api\HttpMethod;
    class ApiHelper 
    {
        static private $apiHelper = NULL;
        static private $baseUrl = "http://127.0.0.1:8088";
        // static private $baseUrl = "http://192.168.137.1:8000";
        private function __construct(){
        }

        static function getInstance()
        {
            if (self::$apiHelper == NULL) {
                self::$apiHelper = new ApiHelper();
            }
            return self::$apiHelper;
        }

        public function post($url,$parameter,$contentType =null) {
           return self::request(HttpMethod::POST,$url,$parameter,$contentType);
        }
        public function get($url,$contentType = null) {
            return self::request(HttpMethod::GET,$url,null,$contentType);  
        }
        public function put($url,$parameter,$contentType = null) {
            return self::request(HttpMethod::PUT,$url,$parameter,$contentType);
        }
        public function delete($url,$parameter,$contentType = null) {
            return  self::request(HttpMethod::DELETE,$url,$parameter,$contentType);
        }

        public function request($method,$url,$parameter = null, $contentType = null) {
            try {
                $client = new \GuzzleHttp\Client();
                if ($parameter == NULL) {
                    $res = $client->request($method, self::$baseUrl."/".$url,[ 
                        'headers' => [
                            'api_token'=>  session('api_token',''),
                            'Accept' => 'application/json',
                            'Content-Type'=>  $contentType == null ? "application/x-www-form-urlencoded" : "application/json"
                        ]
                    ]);
                } else {
                    $res = $client->request($method, self::$baseUrl."/".$url,[ 
                    // 'headers' => [
                    //     'api_token'=>  session('api_token',''),
                    //     'Content-Type'=>  $contentType == null ? "application/x-www-form-urlencoded" : "application/json"
                    // ],
                    // "form_params"=>$parameter]);
                    'headers' => [
                        'api_token'=> session('api_token', ''),
                        'Accept ' =>  $contentType == null ? 'application/x-www-form-urlencoded' : 'application/json'
                    ],
                    // "decode_content" => false,
                    "form_params"=>$parameter,
                    "json" => $parameter]);
                    
                }
                $data = json_decode($res->getBody()->getContents(), true)['data'];
                if  ($res->getStatusCode() < 400 ) {
                   $reponseData = new ResponseData($data, null);
                } else {
                    $reponseData = new ResponseData(null, "Đã xảy ra lỗi");
                }
                return $reponseData;
            } catch (\GuzzleHttp\Exception\RequestException $re) {
                $reponseData = new ResponseData(null, $re);
                return $reponseData;
            } catch (\GuzzleHttp\Exception\ConnectException $re) {
                $reponseData = new ResponseData(null, $re);
                return $reponseData;
            } 
        }
    }

    interface HttpMethod {
        const POST = 'POST';
        const GET = 'GET';
        const PUT = 'PUT';
        const DELETE = "delete";
    }
?>