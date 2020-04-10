<?php

        
        $json = json_decode(file_get_contents('php://input'), true);
        $ch = curl_init();

        $orderId = "231313132";//$json["orderId"];
        $orderAmount = "100";//$json["orderAmount"];
        $type = "TEST";//$json["type"]


        curl_setopt($ch, CURLOPT_URL, 'https://test.cashfree.com/api/v2/cftoken/order');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"orderId\": \"$orderId\",\"orderAmount\":$orderAmount,\"orderCurrency\": \"INR\"}");

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        if($type=="TEST"){
            $headers[] = 'X-Client-Id: 1094485bc2c38cba86872e08c44901';
            $headers[] = 'X-Client-Secret: 6def55970529c30c422efeb739ff1270e47e9e88';
        }else{
            $headers[] = 'X-Client-Id: <Paste Here>';
            $headers[] = 'X-Client-Secret: <Paste Here>';    
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
       
        print_r($result);
        
        curl_close($ch);

   ?>