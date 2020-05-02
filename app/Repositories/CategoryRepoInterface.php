<?php

namespace App\Repositories;


interface CategoryRepoInterface
{
    public function category($slug);
    public function all();
    public function create($request);
    public function update($request, $id);
    public function delete($id);
    public function findByName($name);
}
