<?php

use App\Http\Controllers\ProductController;

it('can update product', function () {

    $product = \Domain\Product\Models\Product::factory()
        ->create();

    \Pest\Laravel\putJson(
        action([ProductController::class, 'update']),
        [
            'product' => $product,
            'price' => 'test'
        ]
    )->assertSessionHasNoErrors();
});