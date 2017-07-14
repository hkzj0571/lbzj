<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $table = 'activity';

    protected $fillable =
        [
            'name',     // 活动名
            'preview',      // 封面
            'intro',      //简介
            'acdate',      //活动时间
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

    public function member()
    {
        return $this->hasMany(Member::class);
    }




}
