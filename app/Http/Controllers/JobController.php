<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Prevents users with 'dev' role to see this page 
        $this->authorize('viewAny', Job::class);

        return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Prevents users with 'dev' role to see this page 
        $this->authorize('create', Job::class);
        return view('jobs.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // JobPolicy to authorize Job Edition
        $this->authorize('update', $job);

        return view('jobs.edit', [
            'job' => $job
        ]);
    }
}
