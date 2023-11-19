<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Sop\CryptoTypes\Asymmetric\EC\ECPublicKey;
// use Sop\CryptoTypes\Asymmetric\EC\ECPrivateKey;
// use Sop\CryptoEncoding\PEM;
// use kornrunner\Keccak;

// use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;

use kornrunner\Ethereum\Address;

class EthController extends Controller
{
    public function createID() {
        try{
            // $address = new Address('arandomprivatekeygeneratedforthisuser');

            // return $address -> getPrivateKey();
            // return "Works";

            return "randomIDPendingFeatureFix";

        }
        catch(\Error $exception){
            return $exception;
        }
    }
}
