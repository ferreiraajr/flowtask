<?php

namespace App\Repositories\Eloquent;

use App\Models\Workspace;
use App\Repositories\Contracts\WorkspaceRepositoryInterface;

class WorkspaceRepository implements WorkspaceRepositoryInterface
{
    public function getAllByUser(int $userId): iterable
    {
        return Workspace::whereHas('users', function($q) use ($userId) {
            $q->where('users.id', $userId);
        })->get();
    }
}