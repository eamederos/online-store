<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepoInterface;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepoInterface $catRepo)
    {
        $this->categoryRepo = $catRepo;
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        if ($name)
        {
            $categories = $this->categoryRepo->findByName($name);
        }
        else
        {
            $categories = $this->categoryRepo->all();
        }
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $$request->validate([
            'name' => 'required|min:7|max:50|unique:categories',
            'slug' => 'required|min:7|max:50|unique:categories',
            'description' => 'required|min:25|max:6000',
        ]);
        $this->categoryRepo->create($request);
       return redirect()->route('admin.category.index')->with('code','Category created');
    }


    public function show($slug)
    {
        $category = $this->categoryRepo->category($slug);
        $edit = true;
        return view('admin.categories.show', compact('category', 'edit'));
    }


    public function edit($slug)
    {
        $category = $this->categoryRepo->category($slug);
        $edit = true;
        return view('admin.categories.edit', compact('category', 'edit'));
    }


    public function update(Request $request, $id)
    {
        $cat = $this->categoryRepo->update($request, $id);
        return redirect()->route('admin.category.index')->with('code','Category updated');
    }


    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('admin.category.index')->with('code','Category deleted');
    }
}
