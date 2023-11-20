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
            // $address = new Address();

            // return $address -> getPrivateKey();

            return $this -> randomIDGenerator();

        }
        catch(\Error $exception){
            return $exception;
        }
    }

    public function randomIDGenerator(){
        $id = "0x";

        $range_text = "1 2 3 4 5 6 7 8 9 0 p o i u y t r e w q a s d f g h j k l m n b v c x z";
        $range = explode(" ",$range_text);
        
        for($count = 0; $count < 32; $count ++){
            $id .= rand(0, count($range) - 1);
        }

        return $id;
    }
}
