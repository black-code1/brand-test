<?php
namespace App\Repositories;

use Lab2view\Generator\BaseRepository;
use App\Contracts\BrandRepository;
use App\Models\Brand;

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
}
