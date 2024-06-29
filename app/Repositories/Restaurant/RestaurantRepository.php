<?php

namespace App\Repositories\Restaurant;

use Log;
use Exception;
use App\Models\Restaurant;
use Illuminate\Database\QueryException;
use App\Repositories\RepositoryInterface;
use App\Utils\Helper;
use Illuminate\Support\Facades\Log as FacadesLog;
use PDOException;

class RestaurantRepository implements RepositoryInterface
{

    public function index(int $id)
    {
        $data = Restaurant::find($id);
        return ($data ? $data : false);
    }

    public function create(array $data)
    {
        return Restaurant::create($data);
    }

    public function update(array $data, $id)
    {
        $dataUpdate = Restaurant::find($id);
        return ($dataUpdate ? $dataUpdate->update($data) : false);
    }

    public function delete(array $data)
    {
        $dataDelete = Restaurant::find($data)->first();
        return ($dataDelete ? $dataDelete->delete() : false);
    }

    public function getAll()
    {
        $data = Restaurant::get();
        return ($data ? $data : false);
    }
}
