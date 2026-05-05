<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class PortfolioProjectController extends Controller
{
    public function index(Request $request)
    {

        $query = PortfolioProject::query();


        if ($request->has('project_type')) {
            $query->where('project_type', $request->project_type);
        }

        return $query->select('id', 'title', 'background_image', 'project_type')->get();
    }
    public function show($id)
    {
        return PortfolioProject::findOrFail($id);
    }
}
