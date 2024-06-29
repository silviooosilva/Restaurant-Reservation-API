<?php

namespace App\Repositories\Table;

use App\Models\Table;
use App\Repositories\RepositoryInterface;

class TableRepository implements RepositoryInterface
{
    public function index(int $id)
    {
        $data = Table::where(['restaurant_id' => $id]);
        return ($data ? $data->get() : false);
    }

    public function create(array $data)
    {
        return Table::create($data);
    }

    public function update(array $data, $id)
    {
        $dataUpdate = Table::find(['restaurant_id' => $data['restaurant_id'], 'id' => $id])->first();
        return ($dataUpdate ? $dataUpdate->update($data) : false);
    }

    public function delete(array $data)
    {
        $dataDelete = Table::find(['restaurant_id' => $data['restaurant_id'], 'id' => $data['id']])->first();
        return ($dataDelete ? $dataDelete->delete() : false);
    }

    public function getAll()
    {
        return Table::get();
    }
}
