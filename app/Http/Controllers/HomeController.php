<?php

namespace App\Http\Controllers;

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
use App\Advertis;
use App\Testimonal;
use App\Topic;
use App\TopicContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\GlobalState\Restorer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::where('status', 1)->get();
        $guideline = Guideline::where('status', 1)->first();
        $education = Education::where('status', 1)->get();
        $others = Other::where('status', 1)->with('other')->get();
        $advert = Advertis::where('status',1)->where('placement','home')->first();
    
        return view('frontend.index', compact(
            'banners',
            'education',
            'guideline',
            'others',
            'advert'
        ));
    }


    public function otherProductList($otherslug)
    {
        $other = Other::where('slug', $otherslug)->first();
                $products = OtherProduct::where('other_id', $other->id)->where('approve',1)->where('status',1)->get();

        // $products = OtherProduct::where('other_id', $other->id)->get();
        return view('frontend.otherproduct.listByOther', compact('products', 'other'));
    }

    public function otherProductDetail($prodslug)
    {
        $product = OtherProduct::where('slug', $prodslug)->first();
        return view('frontend.otherproduct.otherdetail', compact('product'));
    }

    public function subjectDetail($id)
    {
        $subject = Subject::findorFail($id);
        return view('frontend.course-detail', compact('subject'));
    }

    // public function login()
    // {
    //     return view('frontend.login');
    // }

    public function productByeducation($educationslug)
    {
        $education = Education::where('slug', $educationslug)->first();
        $edu = 1;
        $products = Product::where('education_id', $education->id)->where('approve', 1)->where('status', 1)->paginate(12);
        return view('frontend.product.course', compact('products', 'education', 'edu'));
    }


    public function material($id)
    {
        echo json_encode(Material::where("education_id", $id)->pluck("name", "id"));
    }

    public function level($id)
    {
        echo json_encode(Level::where("material_id", $id)->pluck("name", "id"));
    }

    public function semester($id)
    {
        echo json_encode(Semester::where("level_id", $id)->pluck("name", "id"));
    }

    public function product($id)
    {
        if (Auth::user()->is_super_admin == 1) {
            echo json_encode(Product::where("semester_id", $id)->pluck("name", "id"));
        } elseif (Auth::user()->is_super_admin == 0) {
            echo json_encode(Product::where("semester_id", $id)->where('user_id', Auth::user()->id)->pluck("name", "id"));
        }
    }

    public function topic($id)
    {
        echo json_encode(Topic::where("product_id", $id)->pluck("name", "id"));
    }

    public function topiccontent($id)
    {
        echo json_encode(TopicContent::where("topic_id", $id)->pluck("name", "id"));
    }

    public function question($id)
    {
        echo json_encode(Question::where("product_id", $id)->pluck("name", "id"));
    }

    public function otherproduct($id)
    {
        echo json_encode(OtherProduct::where("other_id", $id)->pluck("name", "id"));
    }

    public function terms()
    {
        $term = Term::where('status', 1)->first();
        return view('frontend.terms', compact('term'));
    }

    public function faqs()
    {
        $faqs = Fnq::where('status', 1)->get();
        return view('frontend.faq', compact('faqs'));
    }

    public function events()
    {
        $events = Event::where('status', 1)->get();
        return view('frontend.event.event', compact('events'));
    }

    public function eventDetail($eventslug)
    {
        $event = Event::where('slug', $eventslug)->first();
        $events = Event::where('status', 1)->where('slug', '!=', $eventslug)->get();
        return view('frontend.event.event-detail', compact('event', 'events'));
    }

    public function about()
    {
        $about = About::where('status', 1)->first();
        $guideline = Guideline::where('status', 1)->first();
        $testimonals = Testimonal::where('status', 1)->get();

        return view('frontend.about', compact('about', 'guideline', 'testimonals'));
    }

    public function notices()
    {
        $notices = Notice::where('status', 1)->get();
        return view('frontend.notice.notice', compact('notices'));
    }

    public function noticeDetail($noticeslug)
    {
        $notice = Notice::where('slug', $noticeslug)->first();
        $notices = Notice::where('status', 1)->where('slug', '!=', $noticeslug)->get();
        return view('frontend.notice.notice-detail', compact('notice', 'notices'));
    }


    public function blogs()
    {
        $blogs = Blog::where('status', 1)->get();
        $tag = [];
        return view('frontend.blog.blog', compact('blogs', 'tag'));
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

        return view('frontend.blog.blog-detail', compact('blog', 'blogs', 'tags', 'comments', 'latest'));
    }

    public function byTag($tagslug)
    {
        $blogs = Blog::where('tag_id', $tagslug)->get();
        $tagg = Tag::findorFail($tagslug);
        $tag = $tagg->name;
        return view('frontend.blog.blog', compact('blogs', 'tag'));
    }


    public function singleSearch(Request $request)
    {
        // return  $product = Product::where('author', $request['query'])->first();
        $name = $request['query'];

        $product = Product::where('author', $name)->firstOr(function () use ($name) {
            return  OtherProduct::where('author', $name)->first();
        });
        if ($product) {
            return view('frontend.singleSearch', compact('product'));
        } else {
            return redirect()->back()->with('danger', 'We have no any items related to you search..');
        }



        // // return  $product = Product::where('author', $request['query'])->firstor() {
        // //     return  OtherProduct::where('author', "sanj")->first();
        // // });


        // $query = Product::all();

        // $products = $query->when($name, function ($q) use ($name) {
        //     return $q->where('author', $name)->first();
        // })
        //     ->OtherProduct::where('author', $name)->first();
    }
}
