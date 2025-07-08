<?php

namespace App\Services;

use App\Interfaces\TranslationRepositoryInterface;

class TranslationService
{
    public function __construct(protected TranslationRepositoryInterface $repository) {}

    public function get(array $filters)
    {
        return $this->repository->getAll($filters);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function export(string $locale)
    {
        return $this->repository->exportByLocale($locale);
    }
}

