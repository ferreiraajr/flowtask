<?php

namespace App\Services;

use App\Models\Workspace;
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

    public function createWorkspace(array $data): Workspace
    {
        // return $this->repository->create($data);
        
        $workspace = $this->repository->create($data);

        if (auth()->check()) {
            $workspace->users()->attach(auth()->id(), ['role' => 'owner']);
        }

        return $workspace;
    }
    public function updateWorkspace(Workspace $workspace, array $data): Workspace
    {
        return $this->repository->update($workspace, $data);
    }
    
    public function deleteWorkspace(Workspace $workspace): bool
    {
        return $this->repository->delete($workspace);
    }
}
