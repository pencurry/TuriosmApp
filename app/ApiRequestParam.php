<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 *
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiRequestParam extends Model
{
    protected $fillable = [
        'param_key',
        'param_value',
        'param_type',
        'api_type',
        'api_id',
    ];
}
