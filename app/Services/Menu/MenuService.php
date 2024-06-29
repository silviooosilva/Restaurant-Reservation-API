<?php

namespace App\Services\Menu;

use App\Repositories\RepositoryInterface;

class MenuService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected RepositoryInterface $menuRepository)
    {
    }

    public function index(int $id)
    {
        return $this->menuRepository->index($id);
    }

    public function create(array $data)
    {
        return $this->menuRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->menuRepository->update($data, $id);
    }

    public function delete(array $data)
    {
        return $this->menuRepository->delete($data);
    }


    public function getAll()
    {
        return $this->menuRepository->getAll();
    }
}
