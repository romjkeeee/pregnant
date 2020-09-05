<?php

namespace App;

use App\Traits\MultiLangTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use MultiLangTrait;

    protected $translatedClass = OrdersTranslate::class;
    protected $translatedForeignKey = 'order_id';
    protected $fillable = ['date', 'id_order'];
}
