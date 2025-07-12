<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('petugas.dashboard');

    }

    /**
     * Show the form for creating a new resource.
     */
}