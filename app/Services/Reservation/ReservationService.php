<?php

namespace App\Services\Reservation;

use App\Repositories\RepositoryInterface;

class ReservationService
{
    public function __construct(protected RepositoryInterface $reservationRepository)
    {
    }

    public function index(int $id)
    {
        return $this->reservationRepository->index($id);
    }

    public function create(array $data)
    {
        return $this->reservationRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->reservationRepository->update($data, $id);
    }

    public function delete(array $data)
    {
        return $this->reservationRepository->delete($data);
    }


    public function getAll()
    {
        return $this->reservationRepository->getAll();
    }
}
