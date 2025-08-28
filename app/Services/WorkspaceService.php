<?php

namespace App\Services;

use App\Repositories\Contracts\WorkspaceRepositoryInterface;

class WorkspaceService
{
    protected WorkspaceRepositoryInterface $repository;

    public function __construct(WorkspaceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listUserWorkspaces(int $userId): iterable
    {
        return $this->repository->getAllByUser($userId);
    }
}