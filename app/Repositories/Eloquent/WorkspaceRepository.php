<?php

namespace App\Repositories\Eloquent;

use App\Models\Workspace;
use App\Repositories\Contracts\WorkspaceRepositoryInterface;
use Illuminate\Support\Str;

class WorkspaceRepository implements WorkspaceRepositoryInterface
{
    public function getAllByUser(int $userId): iterable
    {
        return Workspace::whereHas('users', function($q) use ($userId) {
            $q->where('users.id', $userId);
        })->get();
    }

    public function create(array $data): Workspace
    {
    
        if (!isset($data['slug'])) {
            
            $data['slug'] = Str::slug($data['name']);
        }

        return Workspace::create($data);
    }

    public function update(Workspace $workspace, array $data): Workspace
    {
        $workspace->update($data);
        return $workspace;
    }

    public function delete(Workspace $workspace): bool
    {
        return $workspace->delete();
    }
}