<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 *
 */
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name',
        'status',
        'slug',
        'config_key',
        'config_value',
        'is_disabled_default',
    ];


    public function getStatusAttribute($status)
    {
        return title_case($status);
    }

}
