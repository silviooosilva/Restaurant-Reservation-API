<?php

namespace App\Services\Restaurant;

use App\Repositories\RepositoryInterface;

class RestaurantService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected RepositoryInterface $restaurantRepository)
    {
    }

    public function index(int $id)
    {
        return $this->restaurantRepository->index($id);
    }

    public function create(array $data)
    {
        return $this->restaurantRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->restaurantRepository->update($data, $id);
    }

    public function delete(array $data)
    {
        return $this->restaurantRepository->delete($data);
    }


    public function getAll()
    {
        return $this->restaurantRepository->getAll();
    }
}
