<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property float $total_price
 * @property string $img
 * @property string $paid_at
 * @property string $confirmed_at
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property OrderItem[] $orderItems
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'total_price', 'address', 'img', 'paid_at', 'confirmed_at', 'created_at', 'updated_at'];
    public $dates = ['created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\OrderItem');
    }
}
