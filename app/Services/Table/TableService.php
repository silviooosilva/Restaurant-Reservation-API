<?php

namespace App\Services\Table;

use App\Repositories\RepositoryInterface;

class TableService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected RepositoryInterface $tableRepository)
    {
    }

    public function index(int $id)
    {
        return $this->tableRepository->index($id);
    }

    public function create(array $data)
    {
        return $this->tableRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->tableRepository->update($data, $id);
    }

    public function delete(array $data)
    {
        return $this->tableRepository->delete($data);
    }


    public function getAll()
    {
        return $this->tableRepository->getAll();
    }
}
