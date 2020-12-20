<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $species
 * @property string $latin_name
 * @property string $color
 * @property string $characteristic
 * @property string $habitat
 * @property string $shape
 * @property int $total
 * @property string $status
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
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
    protected $fillable = ['type', 'name', 'species', 'latin_name', 'color', 'characteristic', 'habitat', 'shape', 'total', 'status', 'img', 'created_at', 'updated_at'];

}
