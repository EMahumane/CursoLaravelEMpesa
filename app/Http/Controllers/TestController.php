<?php

namespace App\Http\Controllers;

use Explicador\E2PaymentsPhpSdk\Mpesa;
use http\Env\Url;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function indexPage(Request $request) {

        $this->handleMpesa();

        return view('welcome');
    }

    private function handleMpesa () {

        //dd('handleMpesa() called');

        // Your variables

        // The e2payments is REST API based platform
        // find or create your credential from: https://e2payments.explicador.co.mz/admin/credentials

        $client_id = '97be5654-6f21-4a49-9077-9981d97bf085'; //you must change
        $client_secret = 'QvHse2satggIs3sbXJJXSjb0wd1h78ejMB8z9PTa'; //you must change

        // find your wallet_id from: https://e2payments.explicador.co.mz/admin/mpesa
        // or in the organizations where you were invited
        // The wallet_id starts by (#), insert here without (#)

        $wallet_id = '818572'; //you must change

        // SDK initiation for mpesa transaction
        $mpesa = new Mpesa([
            'client_secret' => $client_secret,
            'client_id'     => $client_id,
            'wallet_id'     => $wallet_id,
        ]);

        $phone_number = '843015137';
        $amount = '10';
        $reference = 'TestPagamento';

        //This creates transaction between an M-Pesa short code to a phone number registered on M-Pesa.
        $result = $mpesa->c2b($phone_number, $amount, $reference);

        dd($result);

    }


}
