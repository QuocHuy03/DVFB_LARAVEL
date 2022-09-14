<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }
    public function index()
    {
        //read file clone.txt
        $file = File::get(storage_path('app/public/clone.txt'));
        $file = explode("\n", $file);
        foreach ($file as $item) {
            $clone = explode("|", $item);
            $clone[0] = trim($clone[0]);
            echo $clone[0] . '<br>';
        }
    }
}
