<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Application;
use App\Http\Controllers\Admin\Schema;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    //  public function index()
    // {
    //     return view('admin.dashboard');
    // }


    public function index()
    {
        // Dashboard statistics
        $totalStudents = Student::count();

        $totalTeachers = Teacher::count();

        $totalApplications = Application::count();

        $upcomingEvents = Event::whereDate(
            'event_date',
            '>=',
            now()->toDateString()
        )->count();

        $totalGalleryPhotos = Gallery::count();

        $totalBlogPosts = Blog::count();

        $totalAcademicLevels = 3;

        // $totalFacilities = Facility::count();


        // Recent activities
        $recentStudents = Student::latest()
            ->take(3)
            ->get();

        $recentEvents = Event::latest()
            ->take(3)
            ->get();

        $recentBlogs = Blog::latest()
            ->take(3)
            ->get();


        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalApplications',
            'upcomingEvents',
            'totalGalleryPhotos',
            'totalBlogPosts',
            'totalAcademicLevels',
            // 'totalFacilities',
            'recentStudents',
            'recentEvents',
            'recentBlogs'
        ));
    }
}
