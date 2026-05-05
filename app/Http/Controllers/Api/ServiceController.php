<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all()->map(function ($service) {
            return [
                'id' => $service->id,
                'img_url' => $service->img_url,
                'title1' => $service->title1,
                'description1' => $service->description1,
                'technical' => $service->technical,
                'key_services_count' => count($service->key_services ?? []),
            ];
        });
    }

    // Find One: يرجع كل البيانات
    public function show($id)
    {
        return Service::findOrFail($id);
    }
}
