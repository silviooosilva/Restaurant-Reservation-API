<?php

namespace App\Repositories\Review;

use App\Models\Review;
use App\Repositories\RepositoryInterface;

class ReviewRepository implements RepositoryInterface
{

    public function index(int $id)
    {
        $data = Review::find($id);
        return ($data ? $data->get() : false);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update(array $data, $id)
    {
        $dataUpdate = Review::find($id);
        return ($dataUpdate ? $dataUpdate->update($data) : false);
    }

    public function delete(array $data)
    {
        $dataDelete = Review::find($data);
        return ($dataDelete ? $dataDelete->delete() : false);
    }

    public function getAll()
    {
        $data = Review::get();
        return ($data ? $data : false);
    }
}
