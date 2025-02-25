<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Student;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function department_details()
    {
        return view('pages.faculty.details');
    }
    public function faculty_staff()
    {
        return view('pages.staff.index');
    }
    public function staff__details()
    {
        return view('pages.staff.details');
    }
    public function notices()
    {
        $notices = Notice::latest()->where('status', 'Published')->paginate(18);

        return view('pages.notices.index', compact('notices'));
    }
    public function notice_details(Notice $notice)
    {
        if ($notice->status != 'Published') {
            return abort(404);
        }
        $latestNotices = Notice::where('status', 'Published')
            ->where('id', '!=', $notice->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $examNotices = Notice::where('status', 'Published')
            ->where('type', 'exam')
            ->where('id', '!=', $notice->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $admissionNotices = Notice::where('status', 'Published')
            ->where('type', 'admission')
            ->where('id', '!=', $notice->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('pages.notices.details', compact('notice', 'latestNotices', 'examNotices', 'admissionNotices'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->where('status', 'Published')->paginate(6);
        return view('pages.blog.index', compact('blogs'));
    }
    public function blog_details(Blog $blog)
    {

        if ($blog->status != 'Published') {
            return abort(404);
        }
        $random_upcoming_event = Event::where('status', 'Published')->where('start_date', '>', now())->inRandomOrder()->first();
        $related_blogs = Blog::where('status', 'Published')->where('id', '!=', $blog->id)->inRandomOrder()->limit(3)->get();
        return view('pages.blog.details', compact('blog', 'random_upcoming_event', 'related_blogs'));
    }
    public function event()
    {
        $events = Event::latest()->where('status', 'Published')->paginate(6);
        return view('pages.event.index', compact('events'));
    }
    public function event_details(Event $event)
    {
        if ($event->status != 'Published') {
            return abort(404);
        }
        $related_events = Event::where('status', 'Published')->where('id', '!=', $event->id)->inRandomOrder()->limit(3)->get();
        return view('pages.event.details', compact('event', 'related_events'));
    }
    public function singleProgram()
    {
        return view('pages.program.single');
    }
    public function admission()
    {
        return view('pages.admission');
    }
    public function students()
    {
        $students = Student::latest()->paginate(6);
        return view('pages.students', compact('students'));
    }
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.pages.show', compact('page'));
    }
}
