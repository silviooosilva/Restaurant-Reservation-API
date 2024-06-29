<?php

namespace App\Services\Review;

use App\Repositories\RepositoryInterface;

class ReviewService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected RepositoryInterface $reviewRepository)
    {
    }


    public function index(int $id)
    {
        return $this->reviewRepository->index($id);
    }

    public function create(array $data)
    {
        return $this->reviewRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->reviewRepository->update($data, $id);
    }

    public function delete(array $data)
    {
        return $this->reviewRepository->delete($data);
    }


    public function getAll()
    {
        return $this->reviewRepository->getAll();
    }
}
