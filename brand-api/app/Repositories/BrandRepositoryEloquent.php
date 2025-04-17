<?php
namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lab2view\Generator\BaseRepository;
use App\Contracts\BrandRepository;
use App\Models\Brand;
use Spatie\QueryBuilder\QueryBuilder;

class BrandRepositoryEloquent extends BaseRepository implements BrandRepository
{
    public function __construct(Brand $model)
    {
        parent::__construct($model, [
            'filters' => [],
            'includes' => [],
            'sorts' => [],
            'relations' => [],
        ]);
    }

    /**
     * @param string $iso_3166_2
     * @param int $paginate
     * @return LengthAwarePaginator
     */
    public function getBrandsByCountryIso(string $iso_3166_2, int $paginate = 10): LengthAwarePaginator
    {
        return QueryBuilder::for(Brand::class)
            ->where('iso_3166_2', $iso_3166_2)
            ->paginate($paginate);
    }
}
