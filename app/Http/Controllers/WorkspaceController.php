<?php

namespace App\Http\Controllers;
use App\Services\WorkspaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Workspace $workspace)
    {
        
    }

    public function edit(Workspace $workspace)
    {
        
    }

    public function update(Request $request, Workspace $workspace)
    {
        
    }

    public function destroy(Workspace $workspace)
    {
        
    }
}
