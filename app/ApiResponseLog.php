<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 */
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ApiResponseLog extends Model
{
    protected $fillable = [
        'order_id',
        'api_id',
        'response'
    ];

    public function api()
    {
        return $this->belongsTo(API::class);
    }

}
