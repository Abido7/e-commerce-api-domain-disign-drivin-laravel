<?php

namespace Domain\Admin\Product\Filters;

use Domain\Product\Filters\FilterByprice;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class FilterAction
{

    public static function excute(): Paginator
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::custom('price', new FilterByprice),
                AllowedFilter::partial('name'),
                AllowedFilter::exact('category_id'),
            ])->orderBy('id', 'desc')->paginate(5);
    }
}