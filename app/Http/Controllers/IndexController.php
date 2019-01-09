<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Advert;
use App\Legislation;
use App\Notification;
use Response;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //get start and end of current month
        //$startAndEndOfMonth = $this->getStartAndMonthEnd();
        //dd(News::orderBy('created_at' , 'desc' )->where('approved' , '1')->skip(1)->first() );
        
        //return frontend with data
        return view('frontend.index')
            ->with('notifications' , Notification::orderBy('created_at' , 'desc' )->where('approved' , '1')->get())
            ->with('legislations' , Legislation::orderBy('title' , 'asc' )->where('approved' , '1')->get())
            ->with('posts' , News::orderBy('created_at' , 'desc' )->where('approved' , '1')->paginate(5))
            ->with('postOfTheWeek' , News::orderBy('created_at' , 'desc' )->where('approved' , '1')->skip(1)->first() )
            ->with('adverts' , Advert::orderBy('created_at' , 'desc')->where('approved' , '1')->get());
            
    }

    /**
     * display single page for post
     *
     * @param $slug
     */
    public function single($slug)
    {
        //get all posts
        $post = News::all()->where('slug' , $slug)->first();

        //get start and end of current month
        $startAndEndOfMonth = $this->getStartAndMonthEnd();
    
        return view('frontend.single')
                ->with('legislations' , Legislation::all()->where('approved' , '1'))
                ->with('latest' , News::whereBetween('created_at' , [ $startAndEndOfMonth[0] , $startAndEndOfMonth[1] ] )->where('approved' , '1')->take(5)->get())
                ->with('post' , $post);
    }

    /**
     * display single page for legislation
     *
     * @param $slug
     */
    public function legislation($slug)
    {
        
        //get legislation
        $legislation = Legislation::all()->where('slug' , $slug)->first();
        //dd($legislation);

        //return view
        return view('frontend.legislation')
                ->with('legal' , $legislation)
                ->with('legislations' , Legislation::orderBy('title' , 'asc' )->where('approved' , '1')->get());

    }

    /**
     * download legislation file
     *
     * @param $file
     */
    public function download($file)
    {
        //get file path
        $filename = public_path().'/uploads/legislation/'.$file;
      
        //add headers
        $headers = array('Content-Type:application/pdf');

        //download file
        return Response::download($filename , $file, $headers);
     
    }


    /**
     * get start and end of month
     *
     * @param null
     */
    public function getStartAndMonthEnd()
    {
        $data;

        //get first day of this month
        $start = date('Y-m-01');
        $start = explode("-" ,  $start);
        

        //get last day of current month
        $finish = date('Y-m-d' , strtotime('last day of this month') );
        $finish = explode("-" ,  $finish);

        //start and finish in carbon format
        $start = Carbon::createFromDate( $start[0] ,$start[1], $start[2] );
        $finish = Carbon::createFromDate( $finish[0] ,$finish[1], $finish[2] );

        //add dates to data
        $data[] = $start;
        $data[] = $finish;
     
        return $data;
    }


    /**
     * get start and end of week
     *
     * @param null
     */
    public function getStartAndEndOfWeek()
    {
        $data;

        //get start date of week if current day is not a monday
        $start = ( date('D') != 'Mon' ) ?  date('Y-m-d' , strtotime('last Monday') ) :  date('Y-m-d') ;
        $start = explode("-" ,  $start);

        //get week end if current day is not saturday
        $finish = ( date('D') != 'Sat' ) ?  date('Y-m-d' , strtotime('next Saturday') ) :  date('Y-m-d') ;
        $finish = explode("-" ,  $finish);

        //start and finish in carbon format
        $start = Carbon::createFromDate( $start[0] ,$start[1], $start[2] );
        $finish = Carbon::createFromDate( $finish[0] ,$finish[1], $finish[2] );

        //add dates to data
        $data[] = $start;
        $data[] = $finish;
     
        return $data;
    }


}
