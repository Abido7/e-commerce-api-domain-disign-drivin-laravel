<?php

namespace App\Http\Controllers\Web;

use App\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use Domain\Attribute\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        // dd(Attribute::get());
        return AttributeResource::collection(Attribute::get());
    }
}