<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }


    public function index(){

        return CategoryResource::collection(Category::latest()->get());
    }

    public function show(Category $category){

        return new CategoryResource($category);
    }

    public function destroy(Category $category){

        $category->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function store(Request $request){

        Category::create($request->all());
        return response('Created', Response::HTTP_CREATED);
    }

    public function update(Request $request, Category $category){

        $category->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }
}
