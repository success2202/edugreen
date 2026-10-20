<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SchoolSetting;
use App\Models\Teacher;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function Index()
    {
        $about = AboutPage::first();
         $school = SchoolSetting::first();
         $teachers = Teacher::latest()->get();
         $news = Blog::where('status', 1)
                    ->latest()
                    ->take(3)
                    ->get();
        return view('users.index', compact('about', 'school', 'teachers', 'news'));
    }
}
