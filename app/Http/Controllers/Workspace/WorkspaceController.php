<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workspace\CreateWorkspaceRequest;
use App\Http\Requests\Workspace\UpdateWorkspaceRequest;
use App\Models\Workspace;
use App\Services\WorkspaceService;
use Inertia\Inertia;

class WorkspaceController extends Controller
{

    private WorkspaceService $workspaceService;

    public function __construct(WorkspaceService $workspaceService)
    {
        $this->workspaceService = $workspaceService;
    }

    public function index()
    {
        $userId = auth()->id();

        $workspaces = $this->workspaceService->listUserWorkspaces($userId);

        return Inertia::render('Workspaces/Index', [
            'workspaces' => $workspaces,
        ]);
    }

    public function show(Workspace $workspace)
    {
        return Inertia::render('Workspaces/Show', [
            'workspace' => $workspace,
        ]);
    }

    public function create()
    {
        return Inertia::render('Workspaces/Create');
    }

    public function store(CreateWorkspaceRequest $request)
    {
        $this->workspaceService->createWorkspace($request->validated());

        return redirect()
            ->route('workspaces.index')
            ->with('success', 'Workspace criado com sucesso!');
    }

    public function edit(Workspace $workspace)
    {
        return inertia('Workspaces/Edit', [
            'workspace' => $workspace
        ]);
    }

    public function update(UpdateWorkspaceRequest $request, Workspace $workspace)
    {
        $this->workspaceService->updateWorkspace($workspace, $request->validated());
        return redirect()
            ->route('workspaces.index')
            ->with('success', 'Workspace atualizado com sucesso!');
    }

}
