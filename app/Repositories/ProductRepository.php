<?php

namespace App\Repositories;

use App\Http\Requests\Products\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryContract
{
    public function  __construct(protected Product $product){}

    public function create(CreateProductRequest $request): Product|bool
    {
        try{
            DB::beginTransaction();

            $data = $request->validated();
            $category = Category::find($data['category']);
//            $data['thumbnail'] = 'test';
            $product = $category->products()->create($data);

            DB::commit();

            return $product;
        } catch (\Exception $exception) {
            DB::rollBack();
            logs()->warning($exception);
            return false;
        }
    }
}
