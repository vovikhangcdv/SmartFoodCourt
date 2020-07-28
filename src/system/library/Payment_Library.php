<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Payment_Library 
{
    public function __construct()
    {
        require_once(PATH_APPLICATION . '/model/Db_Model.php');
        require_once(PATH_APPLICATION . '/model/Helper_Model.php');
    }
     
    public function init_payment($amount,$order_id)
    {
        include_once(PATH_APPLICATION . '/config/momo_config.php'); # $array
        header('Content-type: text/html; charset=utf-8');
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        $partnerCode = $array["partnerCode"];
        $accessKey = $array["accessKey"];
        $secretKey = $array["secretKey"];
        $orderInfo = "Thanh toán qua MoMo";
        $orderId = time() . "";
        $amount = (string)($amount);
        $returnUrl = "http://"."$_SERVER[HTTP_HOST]"."?c=payment&a=result";
        $notifyurl = "http://"."$_SERVER[HTTP_HOST]"."?c=payment&a=ipn_momo";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $extraData = "merchantName=MoMo Partner";

        $requestType = "captureMoMoWallet";
        $requestId = time() . "";
        //before sign HMAC SHA256 signature
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
        // die(var_dump($jsonResult));
        header('Location: ' . $jsonResult['payUrl']);
    }
    public function result(){
        include_once(PATH_APPLICATION . '/config/momo_config.php'); # $array
        header('Content-type: text/html; charset=utf-8');
        $secretKey = $array["secretKey"]; //Put your secret key in there

        if (!empty($_GET)) {
            $partnerCode = $_GET["partnerCode"];
            $accessKey = $_GET["accessKey"];
            $orderId = $_GET["orderId"];
            $localMessage = $_GET["localMessage"];
            $message = $_GET["message"];
            $transId = $_GET["transId"];
            $orderInfo = $_GET["orderInfo"];
            $amount = $_GET["amount"];
            $errorCode = $_GET["errorCode"];
            $responseTime = $_GET["responseTime"];
            $requestId = $_GET["requestId"];
            $extraData = $_GET["extraData"];
            $payType = $_GET["payType"];
            $orderType = $_GET["orderType"];
            $extraData = $_GET["extraData"];
            $m2signature = $_GET["signature"]; //MoMo signature


            //Checksum
            $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
                "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
                "&payType=" . $payType . "&extraData=" . $extraData;

            $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

            if ($m2signature == $partnerSignature) {
                if ($errorCode == '0') {
                    $result = '<div class="alert alert-success"><strong>Payment status: </strong>Success</div>';
                    return true;
                } else {
                    $result = '<div class="alert alert-danger"><strong>Payment status: </strong>' . $message .'/'.$localMessage. '</div>';
                    return false;
                }
            } else {
                $result = '<div class="alert alert-danger">This transaction could be hacked, please check your signature and returned signature</div>';
                return false;
            }
        }
    }
}