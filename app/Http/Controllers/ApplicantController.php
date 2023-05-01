<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(Job $job)
    {
        return view('applicants.index', [
            'job' => $job
        ]);
    }
}
