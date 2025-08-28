<?php

namespace App\Repositories\Contracts;

interface WorkspaceRepositoryInterface
{
    public function getAllByUser(int $userId): iterable;
}