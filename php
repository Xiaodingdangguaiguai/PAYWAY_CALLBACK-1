<?php

$curl = curl_init();

#$search_trans = transactions/search-receipt?receiptNumber=;
#$cus_number =  ;

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.payway.com.au/rest/v1/customers",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic VDEwNzg2X1NFQ191dHhheHNicXRjNHR0c3B4NHJwZmszY3gyYnRtZzR5ejZqcGYydm02OTNxeWVzYXN6M2hpbWU3OGR0aXM6",
    "cache-control: no-cache",
    "postman-token: 87462809-2020-5557-bc51-f845b7b1fe5b"
  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


#将json解码
$de_response = json_decode($response, true);

#用户总数
$customer_amount = count($de_response['data']); 


#For loop 输出Customer Number 与 Customer Name

if ($err) {
  echo "cURL Error #:" . $err;
} else {
echo "<ul>"; //缩进
echo "Customer Number : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Name : "; //&nbsp; 空格

  for($i=0; $i < $customer_amount; $i++ ){

    #将json编码，显示Customer Number.
    #echo "<li>".$CustomerNumber = json_encode($de_response['data'][$i]['customerNumber']). "</li>";

    #将json编码，显示Customer Name.
    #echo "<li>".$CustomerName = json_encode($de_response['data'][$i]['customerName'])."</li>";
    #客户No & Name
    
    $CustomerNumber = json_encode($de_response['data'][$i]['customerNumber']);    
    $CustomerName = json_encode($de_response['data'][$i]['customerName']);
    
    echo "<li>". $CustomerNumber. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $CustomerName. "</li>";

  }

 echo "</ul>"; //结束缩进
}
