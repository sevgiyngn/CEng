<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'asset_categories';

    protected $dates = [
        'delivery_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        '0' => 'Depoda',
        '1' => 'Dağıtımda',
        '2' => 'Teslim Edildi',
    ];

    protected $fillable = [
        'serial_number',
        'name',
        'product_brand',
        'product_model',
        'product_description',
        'amountofstock',
        'minimum_stock',
        'category_id',
        'sub_category_id',
        'delivery_date',
        'store_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function productsDeliveries()
    {
        return $this->belongsToMany(Delivery::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(AltKategoriler::class, 'sub_category_id');
    }

    public function getDeliveryDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
