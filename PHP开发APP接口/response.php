<?php
/**
 * Created by PhpStorm.
 * User: Pascal
 * Date: 2017/11/5
 * Time: 15:32
 */
//
//$arr = array(
//    'id' => 1,
//    'username'=>'pascal'
//);
//
//echo json_encode($arr);
//$data = '输出json数据';
//$newData = iconv('UTF-8','GBK',$data);
//echo json_encode($newData);
class Response{

    public static function json($code, $message='', $data=[]){
        if(is_numeric($code)){
            return '';
        }

        $result = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        echo json_encode($result);
        exit();
    }

    /**
     * 生成xml格式接口数据
     * @param $code
     * @param $message
     * @param $data
     */
    public static function xml($code, $message='', $data=[]){
        header('content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= "<root>\n";
        $xml .= "<code>$code</code>\n";
        $xml .= "<message>$message</message>\n";
        $xml .= "<data>$data</data>\n";
        $xml .= "</root>";
        echo $xml;
    }
}

$code = 200;
$message = '返回数据成功';
$data = [
    'id'=>1,
    'username' => 'pascal',
    'age' => 28,
];
Response::json($code, $message, $data);