<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Member extends Model
{
    protected $table = 'members';


    protected $fillable =
        [
            'name',     // 用户名
            'phone',      // 手机号
            'wechat',      //微信号
            'activity_id',      //活动ID


        ];

    /**
     * 人性化显示添加时间
     *
     * @param $date
     * @return string|static
     */
    public function getCreatedAtAttribute($date)
    {
        if (Carbon::now() > Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * 人性化显示修改时间
     *
     * @param $date
     * @return string|static
     */
    public function getUpdatedAtAttribute($date)
    {
        if (Carbon::now() > Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}
