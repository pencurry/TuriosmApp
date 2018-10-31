<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiMapping extends Model
{
    protected $fillable = [
        'package_id',
        'api_package_id',
        'api_id',
    ];
}