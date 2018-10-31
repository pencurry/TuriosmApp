<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 *
 */
namespace App\Http\Controllers;

use Auth;
use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function getPaymentMethods()
    {
        $enabled_payment_methods = [];
        if (!empty(Auth::user()->enabled_payment_methods)) {
            $enabled_payment_methods = explode(',', Auth::user()->enabled_payment_methods);
        }

        $paymentMethods = PaymentMethod::where(['config_key' => null, 'status' => 'ACTIVE'])
            ->whereIn('id', $enabled_payment_methods)
            ->groupBy('slug')
            ->orderBy('id')
            ->get();
        return view('payments.select-payment-method', compact('paymentMethods'));
    }

}
