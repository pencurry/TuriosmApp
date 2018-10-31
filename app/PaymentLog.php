<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 */
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $fillable = [
        'details',
        'currency_code',
        'total_amount',
        'payment_method_id',
        'user_id'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return is_null($date)
            ? ''
            : Carbon::createFromFormat('Y-m-d H:i:s', $date)->timezone(config('app.timezone'))->toDateTimeString();
    }

    public function getUpdatedAtAttribute($date)
    {
        return is_null($date)
            ? ''
            : Carbon::createFromFormat('Y-m-d H:i:s', $date)->timezone(config('app.timezone'))->toDateTimeString();
    }
}
