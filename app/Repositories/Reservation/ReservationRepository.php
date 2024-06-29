<?php

namespace App\Repositories\Reservation;

use App\Models\Reservation;
use App\Repositories\RepositoryInterface;

class ReservationRepository implements RepositoryInterface
{

    public function index(int $id)
    {
        $data = Reservation::where(['restaurant_id' => $id]);
        return ($data ? $data->get() : false);
    }

    public function create(array $data)
    {
        return Reservation::create($data);
    }

    public function update(array $data, $id)
    {
        $dataUpdate = Reservation::find(['restaurant_id' => $data['restaurant_id'], 'id' => $id])->first();
        return ($dataUpdate ? $dataUpdate->update($data) : false);
    }

    public function delete(array $data)
    {
        $dataDelete = Reservation::find(['restaurant_id' => $data['restaurant_id'], 'id' => $data['id']])->first();
        return ($dataDelete ? $dataDelete->delete() : false);
    }

    public function getAll()
    {
        return Reservation::get();
    }
}
