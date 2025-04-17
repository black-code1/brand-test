<?php

namespace App\Http\Controllers\Api;

use App\Contracts\BrandRepository;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends BaseController
{

    public function __construct(public BrandRepository $brandRepository){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
        $iso_3166_2 = $request->header('CF-IPCountry');

        if ($iso_3166_2) {
            $brands = $this->brandRepository->getByAttribute('iso_3166_2',$iso_3166_2);
            return BrandResource::collection($brands);
        }
        return BrandResource::collection($this->brandRepository->all($request->query() ?? []));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): JsonResponse
    {
        /** @var Brand|null $brand */
        $brand = $this->brandRepository->store($request->validated());

        if ($brand) {
            return (new BrandResource($brand))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        }

        return $this->errorMessage(__('messages.error.store', ['model' => __('messages.models.brand')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): BrandResource
    {
        $brand  = $this->brandRepository->getById($id);

        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand): BrandResource|JsonResponse
    {
        /** @var Brand|null $brand */
        $brand = $this->brandRepository->update($brand->brand_id, $request->validated());

        if ($brand) {
            return new BrandResource($brand);
        }

        return $this->errorMessage(__('messages.error.update', ['model' => __('messages.models.brand')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): JsonResponse
    {
        if ($this->brandRepository->destroy($brand)) {
            return $this->successMessage(__('messages.success.remove', ['model' => __('messages.models.brand')]));
        } else {
            return $this->errorMessage(__('messages.error.remove', ['model' => __('messages.models.brand')]));
        }
    }
}
