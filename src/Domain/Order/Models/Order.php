<?php

namespace Domain\Order\Models;

use App\Enums\OrderStatusEnum;
use Domain\OrderDetails\Models\OrderDetail;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'address',
        'total',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function products()
    {
        return $this->hasMany(products::class);
    }
}