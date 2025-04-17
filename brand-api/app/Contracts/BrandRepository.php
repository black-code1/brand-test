<?php
namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lab2view\Generator\RepositoryInterface;

/**
 * Interface BrandRepository
 * @package App\Contracts
 */
interface BrandRepository extends RepositoryInterface
{
    public function getBrandsByCountryIso(string $iso_3166_2, int $paginate = 10): LengthAwarePaginator;
}
