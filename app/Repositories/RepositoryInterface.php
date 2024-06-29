<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function index(int $id);

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(array $data);

    public function getAll();
}
