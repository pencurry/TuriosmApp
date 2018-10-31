<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 *
 */
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/payment/add-funds/bitcoin/bit-ipn',
        '/payment/add-funds/payza/status',
        '/payment/add-funds/paypal/status',
        '/payment/add-funds/instamojo/webhook',
        '/payment/add-funds/skrill/ipn',
        '/payment/add-funds/paywant/status'
    ];
}
