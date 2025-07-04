<?php

class  ResponseService {

    public static function success_response($payload){
        $response = [];
        if ($payload){
        $response["status"] = 200;
        $response["payload"] = $payload;
        return json_encode($response);
    }
        return $response["status"] = 404;
    }


}