<?php namespace App;
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 */
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'price_per_item',
        'minimum_quantity',
        'maximum_quantity',
        'description',
        'slug',
        'status',
        'service_id',
        'custom_comments',
        'preferred_api_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
