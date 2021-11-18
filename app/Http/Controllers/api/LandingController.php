<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;

use App\Setting;
use App\Contact;
use App\About;
use App\Banner;
use App\Blog;
use App\Comment;
use App\Education;
use App\Event;
use App\Fnq;
use App\Guideline;
use App\Level;
use App\Material;
use App\Notice;
use App\Other;
use App\OtherProduct;
use App\Product;
use App\Question;
use App\Semester;
use App\Subject;
use App\Tag;
use App\Term;
use App\Testimonal;
use App\Topic;
use App\TopicContent;
use App\Subscribe;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class LandingController extends Controller
{
    public function eventList(){
        $events = Event::where('status', 1)->get();
        return response()->json([
            'events' => $events,
            'success' =>'200'
        ]);
    }
    
     public function eventDetail($eventslug)
    {
        $event = Event::where('slug', $eventslug)->first();
        $events = Event::where('status', 1)->where('slug', '!=', $eventslug)->get();
        return response()->json([
            'events' => $events,
            'event' => $event,
            'success' =>'200'
        ]);    

    }
    
    public function blogList(){
        $blogs = Blog::where('status',1)->get();
        return response()->json([
            'blogs' => $blogs,
            'success' =>'200'
        ]);
    }
    
     public function blogDetail($blogslug)
    {
        $blog = Blog::where('slug', $blogslug)->first();
        $tags = Tag::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->where('slug', '!=', $blogslug)->get();
        $comments = Comment::where('blog_id', $blog->id)->where('status', 1)->get();

        $latest = Blog::when(Blog::count() > 3, function ($q) {
            return $q->latest()->limit(3);
        })->latest()->get();

        return response()->json([
            'blog' => $blog,
            'blogs' => $blogs,
            'tags' => $tags,
            'comments' => $comments,
            'latest' => $latest,
            'success' =>'200'
        ]);
    }
    
    public function blogByTag($tagslug)
    {
        $blogs = Blog::where('tag_id', $tagslug)->get();
        $tagg = Tag::findorFail($tagslug);
        $tag = $tagg->name;
        
        return response()->json([
            'tagg' => $tagg,
            'blogs' => $blogs,
            'tag' => $tag,
            'success' =>'200'
        ]);    
        
    }
    
    public function about()
    {
        $about = About::where('status', 1)->first();
        $guideline = Guideline::where('status', 1)->first();
        $testimonals = Testimonal::where('status', 1)->get();

        return response()->json([
            'about' => $about,
            'guideline' => $guideline,
            'testimonals' => $testimonals,
            'success' =>'200'
        ]);    
        
    }
    
    public function term()
    {
        $term = Term::where('status', 1)->first();
        
        return response()->json([
            'term' => $term,
            'success' =>'200'
        ]);        
        
    }
    
     public function faqs()
    {
        $faqs = Fnq::where('status', 1)->get();
        return response()->json([
            'faqs' => $faqs,
            'success' =>'200'
        ]);        
        
    }
    
    public function notices()
    {
        $notices = Notice::where('status', 1)->get();
        return response()->json([
            'notices' => $notices,
            'success' =>'200'
        ]);
    }
    
    public function setting()
    {
        $setting = Setting::where('status', 1)->get();
        return response()->json([
            'setting' => $setting,
            'success' =>'200'
        ]);
    }
    
    public function contactStore(Request $request)
    {
        $data = $this->validate($request, [
            'fullname' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);
        $data['status'] = 0;
        Contact::create($data);
        
        return response()->json([
            'message' => 'message sent',
            'success' =>'200'
        ]);
    }
    
    public function subscribeStore(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email|unique:subscribes',
        ]);

        Subscribe::create($data);

        return response()->json([
            'message' => 'Subscribed Successfully!!',
            'success' =>'200'
        ]);
    }
    
    
}