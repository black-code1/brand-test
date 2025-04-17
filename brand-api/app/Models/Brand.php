<?php

namespace App\Models;

use App\Helpers\FormatException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
    use InteractsWithMedia;
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

    public function registerMediaConversions(?Media $media = null): void
    {
        try {
            $this->addMediaConversion('web')
                ->optimize();
        } catch (InvalidManipulation $e) {
            Log::alert('BRAND REGISTER MEDIA CONVERSIONS EXCEPTION', FormatException::from($e));
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}
