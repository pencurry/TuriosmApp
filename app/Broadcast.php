<?php
/**
 * Proneilrabbit - SMM Panel script
 * Broadcast By Proneil.com
 *
 */
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Broadcast extends Model
{
  //  protected $appends = ['unread_message_count'];
    protected $fillable = [
        'MsgTitle',
        'MsgText',
        'MsgStatus',
        'StartTime',
        'ExpireTime',
        'Icon'
    ];

//    public function messages()
//    {
//        return $this->hasMany(TicketMessage::class);
//    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

//    public function getUnreadMessageCountAttribute()
//    {
//        return $this->messages()->where(['is_read' => false])->whereNotIn('user_id',[Auth::user()->id])->count();
//    }


    public function getStatusAttribute($MsgStatus)
    {
        return title_case($MsgStatus);
    }

//    public function getCreatedAtAttribute($date)
//    {
//        return is_null($date)
//            ? ''
//            : Carbon::createFromFormat('Y-m-d H:i:s', $date)->timezone(config('app.timezone'))->toDateTimeString();
//    }
//
//    public function getUpdatedAtAttribute($date)
//    {
//        return is_null($date)
//            ? ''
//            : Carbon::createFromFormat('Y-m-d H:i:s', $date)->timezone(config('app.timezone'))->toDateTimeString();
//    }
}