<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\SchoolSetting;
use App\Models\Teacher;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class PageContrroller extends Controller
{
    //
    public function Index()
    {
        $school = SchoolSetting::first();

        $teachers = Teacher::where('status', 1)
            ->latest()
            ->paginate(8);
        return view('users.teacher.teachers', compact('school', 'teachers'));
    }

    public function TeacherDetails($id)
    {
        $teacher = Teacher::findOrFail($id);
        $school = SchoolSetting::first();
        return view('users.teacher.teacherDetails', compact('teacher', 'school'));
    }


    public function Events()
    {
        $school = SchoolSetting::first();
        $events = Event::where('status', 1)
            ->latest()
            ->paginate(8);
        return view('users.event.events', compact('school', 'events'));
    }

    public function EventDetails($id)
    {
        $event = Event::findOrFail($id);
        $school = SchoolSetting::first();
        return view('users.event.eventDetails', compact('event', 'school'));
    }

    public function About()
    {
        $school = SchoolSetting::first();
        $about = AboutPage::first();
        return view('users.about.aboutUs', compact('school','about'));
    }

    public function Blog(Request $request)
    { 
        $school = SchoolSetting::first();
        $query = Blog::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        $blogs = $query->latest()->paginate(8)->withQueryString();
        $recentBlogs = Blog::latest() ->take(3) ->get();
        return view('users.blog.blogs', compact('school', 'blogs', 'recentBlogs'));
    }

    public function BlogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        $school = SchoolSetting::first();
        $recentBlogs = Blog::latest() ->take(3) ->get();
        return view('users.blog.blogDetails', compact('blog', 'school', 'recentBlogs'));
    }

    public function Contact()
    {
        $school = SchoolSetting::first();
        
        return view('users.contact.contactUs', compact('school'));
    }

    public function Profile(){
        $school = SchoolSetting::first();
        return view('users.proprietress.profile', compact('school'));

    }

    public function Gallery()
    {
        $school = SchoolSetting::first();
        $galleries = Gallery::where('status', 1)

            ->latest()
            ->paginate(9);

        return view('users.gallary.gallaries', compact('galleries', 'school'));
    }

    // public function Application(){

    //  $school = SchoolSetting::first();
    //     return view('users.application.apply', compact('school'));
    // }


    public function Advancement(){
        $school = SchoolSetting::first();
    return view('users.scholarship.advancement',  compact('school'));
    }

     public function Giving(){
        $school = SchoolSetting::first();
    return view('users.scholarship.giving',  compact('school'));
    }


     public function Scholarship(){
        $school = SchoolSetting::first();
    return view('users.scholarship.index',  compact('school'));
    }

    public function Policy(){
        $school = SchoolSetting::first();
    return view('users.policy.policy',  compact('school'));
    }

    public function SchoolCurriculum(){
        $school = SchoolSetting::first();
    return view('users.curriculum.index',  compact('school'));
    }

     public function TermsCondition(){
        $school = SchoolSetting::first();
    return view('users.policy.terms',  compact('school'));
    }

}
