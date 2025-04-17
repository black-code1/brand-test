<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Action
 *
 * @property int $brand_id
 * @property string $brand_name
 * @property string $brand_image
 * @property integer $rating
 * @property string $iso_3166_2
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Brand extends Model
{
    /**
     * @var string
     */
    public $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_name',
        'brand_image',
        'rating',
        'iso_3166_2',
    ];
}
