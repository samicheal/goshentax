<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\User;
use App\AuditNews;
use Auth;
use Session;
use Validator;
use Response;
use View;

class NewsController extends Controller
{

    //decalare instance variables
    private $input;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view for mangeposts for user
        if(Auth::user()->role == "USER")
            return view('news.managenews')->with('posts' , User::find(Auth::id())->news);
      
        //view for admin and superadmin  
        return view('news.managenews')->with('posts' , News::all());    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return post creation view
        return view('news.news');     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'featured' => 'required|image',
            'content' => 'required|string'
        ]);

        if ($validator->fails()) 
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

        //check for duplicate
        $duplicate = News::all()->where('title' , $request->title)->count();

        if(!$duplicate){
            //get image content
            $featured = $request->featured;
            
            //create custom name for featured image
            $featured_new_name = time().$featured->getClientOriginalName();

            //move image to uploads folder
            $featured->move('uploads/post' , $featured_new_name);

            //declare approval status of request and request variables
            $approved = 1;

            //database update preparation
            if(Auth::user()->role == "USER")
                 $approved = 0;  
        
            //append request data to global input variable
            $this->input = request()->all();
            $this->input['approved'] = $approved;
            $this->input['featured'] =  $featured_new_name;
            $this->input['user_id'] =  Auth::id();

            //upload data using tranactions to enable rollbacks and committs
            DB::transaction(function(){

                $news = News::create([
                    'title' => $this->input['title'],
                    'content' => $this->input['content'],
                    'approved' => $this->input['approved'],
                    'slug' => str_slug($this->input['title']),
                    'featured' => 'uploads/post/'.$this->input['featured'],
                    'user_id' => $this->input['user_id']
                ]);

                $audit_news = AuditNews::create([
                    'action' =>  'create',
                    'resource_name' => $this->input['title'],
                    'user_id' => $this->input['user_id']
                ]);

            });
            
            return Response::json(array('success' => 'Post created successfully.'));
        }
        else{
            return Response::json(array('alert' => 'Post with same title already exists'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        //for error handling
        try{
                //retrieve post with id
                $post = News::find($id);
                    
                //set approval status to 1
                $post->approved = 1;

                //save post
                if($post->save()){

                    //create success message
                    Session::flash('success' , "Post approved");

                    // redirect to home page
                    return redirect()->route('news.manage');
                }
            }
            catch(\Exception $e){
                //create success message
                Session::flash('success' , "Post approved");

                // redirect to home page
                return redirect()->route('news.manage');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retrieve post with id
        $post = News::find($id);

        //return view
        return view('news.newsedit')->with('post' , $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $validated = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $post = News::find($id);

        if($request->hasFile('featured')){
            
            //get image content
            $featured = $request->featured;
            
            //create custom name for featured image
            $featured_new_name = time().$featured->getClientOriginalName();

            //move image to uploads folder
            $featured->move('uploads/post' , $featured_new_name);

            $post->featured = 'uploads/post/'.$featured_new_name;

        }

            //declare approval status of request and request variables
            $approved = $post->approved;

            //database update preparation
            if(Auth::user()->role == "USER")
                 $approved = 0;  
        
            //append request data to global input variable
            $this->input = request()->all();
            $this->input['approved'] = $approved;
            $this->input['user_id'] =  Auth::id();

            //
            $post->title = $this->input['title'];
            $post->content = $this->input['content'];
            $post->approved = $this->input['approved'];
            $post->slug = str_slug($this->input['title']);
            $post->user_id = $this->input['user_id'];

            if($post->save()){
                $audit_news = AuditNews::create([
                    'action' =>  'edit',
                    'resource_name' => $this->input['title'],
                    'user_id' => $this->input['user_id']
                ]);
            }

            //create success message
            Session::flash('success' , 'Post edited successfully');

            // redirect to home page
            return redirect()->route('news.manage');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //return Response::json(array('data' => $request->toArray()));
        //find resource to be deleted
        $news = News::find($request->id);

        //create new audit object
        $audit = new AuditNews;

        //delete news
        if($news->delete()){

            $audit->action = "delete";
            $audit->resource_name = $news->title;
            $audit->user_id = $news->user_id;

            $audit->save(); //save to audit_news

            return Response::json(array('success' => 1 , 'id' => $request->id));
        }

        return Response::json(array('fail' => 1));
    }
}
