<?php

namespace App\Repositories\Menu;

use App\Models\MenuItem;
use App\Repositories\RepositoryInterface;

class MenuRepository implements RepositoryInterface
{

    public function index(int $id)
    {
        return MenuItem::where(['restaurant_id' => $id])->get();
    }

    public function create(array $data)
    {
        return MenuItem::create($data);
    }

    public function update(array $data, $id)
    {
        $menu = MenuItem::find($id);
        return ($menu ? $menu->update($data) : false);
    }

    public function delete(array $data)
    {

        $menu = MenuItem::find($data)->first();
        return ($menu ? $menu->delete($data) : false);
    }

    public function getAll()
    {
    }
}
