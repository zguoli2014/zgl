<?php  
  
function request_by_curl($remote_server, $post_string) {  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    $data = curl_exec($ch);
    curl_close($ch);  
               
    return $data;  
}  
 
$webhook = "https://oapi.dingtalk.com/robot/send?access_token=0bfe72a5003a30258446f5ad3ccbd95146aafd0ee2d6069ebb1d9623e030b360";
$message="我就是我, 是不一样的烟火";
$data = array ('msgtype' => 'text','text' => array ('content' => $message));
$data_string = json_encode($data);
 
$result = request_by_curl($webhook, $data_string);  
echo $result;
 
?>