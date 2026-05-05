<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReadyToTransformYourBusiness;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReadyToTransformYourBusinessController extends Controller
{
    public function store(Request $request)
    {

        $allowedCategories = [
            'Web Development',
            'IT Service',
            'Cloud Service',
            'Cybersecurity',
            'Business Consulting',
            'Marketing & Branding',
            'Mobile App Development'
        ];

        // Validation
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'service_category' => [
                'required',
                'string',
                Rule::in($allowedCategories), 
            ],
        ]);

        // Create Record
        $data = ReadyToTransformYourBusiness::create($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'Your request has been sent successfully!',
            'data'    => $data
        ], 201);
    }
}
