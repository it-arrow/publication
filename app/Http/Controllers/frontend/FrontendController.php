<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Award;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Callback;
use App\Models\Client;
use App\Models\CompanyDocument;
use App\Models\Counter;
use App\Models\Country;
use App\Models\CurrentDemand;
use App\Models\DemandDocument;
use App\Models\Message;
use App\Models\Opportunity;
use App\Models\Page;
use App\Models\Photo;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Training;
use App\Models\Trust;
use App\Models\WhyUs;
use App\Models\Testimonial;
use App\Models\Payment;
use App\Models\Policy;
use App\Models\ServiceCategory;
use App\Models\SocialMedia;
use App\Models\Step;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\Strength;
use Illuminate\Http\Request;
use Mail;
use App\Models\Book;
use App\Models\Token;
use Illuminate\Support\Str;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\UserToken;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class FrontendController extends Controller
{

    public function index(){
        // Session::forget('token');
        // dd(Session::get('token'));
        $setting=SiteSetting::first();
        $sliders=Slider::where('status',1)->get();
        $blogs = Blog::orderBy('created_at','desc')->where('status',1)->take(3)->get();
        $clients=Client::all();
        $whyus=WhyUs::first();
        $categories=ServiceCategory::get();
        $about=About::first();
        $pages=Page::all();
        $trusts=Trust::all();
        $counters=Counter::get();
        $testimonials=Testimonial::all();
        $countries=Country::take(6)->get();
        $banner=Banner::first();
        $faqs=Faq::all();
        $book = Book::first();
        return view('frontend.index',compact('setting','faqs','sliders','blogs','clients','whyus','banner','categories','about','trusts','counters','testimonials','countries','book'));
    }
    public function about(){
        $about = About::first();
        if($about){
            $setting=SiteSetting::first();
            $whyus=WhyUs::first();
            $breadcrumb=HomePage::where('section','about')->first();
            return view('frontend.about',compact('setting','about','whyus','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function awards(){
        $awards = Award::all();
        if($awards){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','award')->first();
            return view('frontend.awards',compact('setting','awards','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function mission_vision(){
        $mission = About::first();
        if($mission){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','mission-vision')->first();
            return view('frontend.mission-vision',compact('setting','mission','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function chairman_message(){
        $message = About::first();
        if($message){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','chairman-message')->first();
            return view('frontend.chairman-message',compact('setting','message','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function organization_chart(){
        $chart = About::first();
        if($chart){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','chart')->first();
            return view('frontend.organization-chart',compact('setting','chart','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function company_documents(){
        $documents = CompanyDocument::all();
        if($documents){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','company-document')->first();
            return view('frontend.company-documents',compact('setting','documents','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function demand_documents(){
        $documents = DemandDocument::all();
        if($documents){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','demand-document')->first();
            return view('frontend.demand-documents',compact('setting','documents','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function our_strength(){
        $strengths = Strength::all();
        if($strengths){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','strength')->first();
            return view('frontend.our-strength',compact('setting','strengths','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }
    public function strength_detail($slug){
        $strength = Strength::where('slug',$slug)->first();
        if($strength){
            $setting=SiteSetting::first();
            return view('frontend.strength-detail',compact('setting','strength'));
        }else{
            return view('frontend.404');
        }

    }
    public function calendar(){
        $setting=SiteSetting::first();
        return view('frontend.calendar',compact('setting'));
    }
    public function countries(){
        $countries = Country::all();
        if($countries){
            $setting=SiteSetting::first();
            return view('frontend.countries',compact('setting','countries'));
        }else{
            return view('frontend.404');
        }

    }
    public function blog(){
        $blogs = Blog::orderBy('created_at','desc')->where('status',1)->paginate(12);
        if($blogs!=null){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','blog')->first();
            return view('frontend.blog',compact('setting','blogs','breadcrumb'));
        }else{
            return view('frontend.404');
        }

    }

    public function blog_detail($slug){
        $blog = Blog::where('slug',$slug)->first();
        if($blog!=null){
            $setting=SiteSetting::first();
            $blogs=Blog::latest()->take(6)->get();
            return view('frontend.blog-detail',compact('setting','blog','blogs'));
        }else{
            return view('frontend.404');
        }
    }
    public function photo_gallery(){
        $photos = Photo::paginate(2);
        if($photos!=null){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','gallery')->first();
            return view('frontend.photo',compact('setting','photos','breadcrumb'));
        }else{
            return view('frontend.404');
        }
    }
    public function teams(){
        $teams = Team::all();
        if($teams!=null){
            $setting=SiteSetting::first();

            return view('frontend.teams',compact('setting','teams'));
        }else{
            return view('frontend.404');
        }
    }
    public function team_detail($id){
        $team = Team::findOrFail($id);
        if($team!=null){
            $setting=SiteSetting::first();
            return view('frontend.team-detail',compact('setting','team'));
        }else{
            return view('frontend.404');
        }
    }
    public function career(){
        $setting=SiteSetting::first();
        return view('frontend.apply-now',compact('setting'));
    }

    public function services($slug){
        $category=ServiceCategory::where('slug',$slug)->first();
        $services = $category->services;
        if($services!=null){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','category')->first();
            return view('frontend.services',compact('setting','services','category','breadcrumb'));
        }else{
            return view('frontend.404');
        }
    }
    public function search(Request $request){
        $services = Service::latest()->where('name', 'LIKE', '%'.$request->search.'%')->orWhere('tags', 'LIKE', '%'.$request->search.'%')->paginate(12);
        if($services!=null){
            $setting=SiteSetting::first();
            return view('frontend.services',compact('setting','services'));
        }else{
            return view('frontend.404');
        }
    }
    public function service_detail($slug){
        $service = Service::where('slug',$slug)->first();
        if($service!=null){
            $setting=SiteSetting::first();
            $services=Service::latest()->get();
            $whyus=WhyUs::first();
            return view('frontend.service-detail',compact('setting','services','service','whyus'));
        }else{
            return view('frontend.404');
        }
    }
    public function portfolio(){
        $portfolios = Client::latest()->paginate(12);
        if($portfolios!=null){
            $setting=SiteSetting::first();
            return view('frontend.portfolio',compact('setting','portfolios'));
        }else{
            return view('frontend.404');
        }
    }
    public function training_detail($slug){
        $training = Training::where('slug',$slug)->first();
        if($training!=null){
            $setting=SiteSetting::first();
            return view('frontend.single-training',compact('setting','training'));
        }else{
            return view('frontend.404');
        }
    }
    public function training(){
        $trainings = Training::latest()->paginate(12);
        if($trainings!=null){
            $setting=SiteSetting::first();
            return view('frontend.training',compact('setting','trainings'));
        }else{
            return view('frontend.404');
        }
    }
    public function contact(){
        $setting=SiteSetting::first();
        $social=SocialMedia::all();
        return view('frontend.contact',compact('setting','social'));
    }
    public function contact_us(Request $request){
        $request->validate([
            'name'=>'required|string|max:25',
            'email'=>'nullable|email|max:100',
            'subject'=>'required|string|max:100',
            'phone'=>'required|numeric|digits:10|regex:/[9][6-9]\d{8}/',
            'message'=>'nullable|string|max:500'
        ]);
        $message = new Message();
        $message->email = $request->email;
        $message->name = $request->name;
        $message->subject=$request->subject;
        $message->message = $request->message;
        $message->phone = $request->phone;
        $message->save();
        return back()->with('message','Message Send Successfully');


    }
    public function callback(Request $request){
        $request->validate([
            'name'=>'required|string|max:25',
            'phone'=>'required|numeric|digits:10|regex:/[9][6-9]\d{8}/',
            'address'=>'nullable|string|max:150',
            'message'=>'nullable|max:500'

        ]);
        $message = new Callback();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->address = $request->address;
        $message->message = $request->message;

        // $message->time_from=$request->time_from;
        // $message->time_to=$request->time_to;
        $message->save();

        return back()->with('message','Enquiry Placed Successfully');
    }
    public function payment(){
        $setting=SiteSetting::first();
        $payment=Payment::all();
        return view('frontend.payment',compact('setting','payment'));
    }
    public function serviceCategory(Request $request){
        $categories = ServiceCategory::latest()->paginate(10);
        if($categories!=null){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','category')->first();
            return view('frontend.categories',compact('setting','categories','breadcrumb'));
        }else{
            return view('frontend.404');
        }
    }
    public function serviceCategory_detail($slug){
        $category = ServiceCategory::where('slug',$slug)->first();
        if($category!=null){
            $setting=SiteSetting::first();
            return view('frontend.services',compact('setting','category'));
        }else{
            return view('frontend.404');
        }
    }
    public function policy($policy){
        $policy = Policy::where('slug',$policy)->first();
        if($policy!=null){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','policy')->first();
            return view('frontend.policy',compact('setting','policy','breadcrumb'));
        }else{
            return view('frontend.404');
        }
    }
    public function apply_demands($current){
        $demand = CurrentDemand::where('slug',$current)->first();
        if($demand!=null){
            $setting=SiteSetting::first();
            return view('frontend.apply-demands',compact('setting','demand'));
        }else{
            return view('frontend.404');
        }
    }
    public function current_demands(){
        $demands=CurrentDemand::latest()->get();
        if($demands!=null){
            $setting=SiteSetting::first();
            $breadcrumb=HomePage::where('section','current-demand')->first();
            return view('frontend.current-demands',compact('setting','demands','breadcrumb'));
        }else{
            return view('frontend.404');
        }
    }
    public function hiring_process(){
        $hirings=Step::all();
        if($hirings!=null){
            $setting=SiteSetting::first();
            return view('frontend.hiring-process',compact('setting','hirings'));
        }else{
            return view('frontend.404');
        }
    }


    function token_create(Request $request){
        if(Auth::user()!=null){
            //generate tokens
            $token = new Token();
            $generated_token = Str::random(10);
            $token->token = $generated_token;
            $token->expired_at = Carbon::now()->addMinutes(10);
            $token ->save();
            // Config::set('app.token_id', $token->id);
            // return Config::get(key:'app.token_id');
            // get usr id
            $user = Auth::user();
            $user_id = $user->id;

            //store user id and token id
            $user_token = new UserToken();
            $user_token->teacher_id = $user_id;
            $user_token->token_id = $token->id;
            $user_token->save();

            $book = Book::where('id',$request->book_id)->first();
            $mailData = [
                'name'  => $book->name,
                'token'  => $generated_token,
                'grade' => $book->grade,
            ];
            // dd($mailData);
            $user['to']=Auth::user()->email;
            Mail::send('mail',$mailData,function($message) use ($user) {
                $message->to($user['to']);
                $message->subject('Access Code');
            });
            return response()->json(['message'=>'Success']);
        }else{
            return response()->json(['message'=>'please Login']);
        }
    }

    function access_code(Request $request){
        // return Config::get(key:'app.token_id');
        $token = Token::where('token',$request->access_code)->first();
        if($token !=null){
            if(Carbon::now()->isBefore($token->expired_at)){
                $token = UserToken::where('token_id',$token->id)->where('teacher_id',Auth::user()->id)->first();
                if($token != null){
                    return 1;
                }else{
                    return "Please insert Valid Token";
                }
            }else{
                return "date Expired";
            }
        }else{
            return 'Please try again Somthieng worng!';
        }



}

}
