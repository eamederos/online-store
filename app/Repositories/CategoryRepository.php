<?php


namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryRepository implements CategoryRepoInterface
{
     private  $category;

    public function __construct(Category $cat)
    {
        $this->category = $cat;

    }
     public function category($slug)
     {
         return DB::table('categories')->where('slug',$slug)->first();

     }

     public function all()
     {
         return DB::table('categories')->orderBy('name')->paginate(2);
     }

     public function create($request)
     {
        return Category::create($request->all());
     }

     public function update($request, $id)
     {
         $cat = $this->category->find($id);
         return $cat->fill($request->all())->save();
     }

     public function delete($id)
     {
         $cat = $this->category->find($id);
         $cat->delete();
     }

     public function findByName($name)
     {
         return DB::table('categories')->where('name','like',"%$name%")->paginate(2);
     }

}
