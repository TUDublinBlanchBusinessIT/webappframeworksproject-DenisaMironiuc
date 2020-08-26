<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class product
 * @package App\Models
 * @version August 22, 2020, 8:44 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orderdetails
 * @property string $name
 * @property string $description
 * @property string $colour
 * @property number $price
 * @property string $image
 */
class product extends Model
{

    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'description',
        'colour',
        'price',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'colour' => 'string',
        'price' => 'decimal:3',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:30',
        'description' => 'nullable|string|max:30',
        'colour' => 'nullable|string|max:30',
        'price' => 'nullable|numeric',
        'image' => 'nullable|string|max:30'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderdetails()
    {
        return $this->hasMany(\App\Models\Orderdetail::class, 'productid');
    }
}
