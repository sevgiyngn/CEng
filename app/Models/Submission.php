<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'submissions';

    public const STORY_DELIVERY_EMPLOYEE_SELECT = [

    ];

    protected $dates = [
        'store_delivery_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'store_delivery_date',
        'story_delivery_employee',
        'deliveryid_id',
        'depoid_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStoreDeliveryDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStoreDeliveryDateAttribute($value)
    {
        $this->attributes['store_delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function deliveryid()
    {
        return $this->belongsTo(Delivery::class, 'deliveryid_id');
    }

    public function depoid()
    {
        return $this->belongsTo(Store::class, 'depoid_id');
    }
}
