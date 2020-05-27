<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin');
        $this->request = $request;
    }

    public function index()
    {
        $movies= Movie::all();
        return view('admin.Movie.index',['movies'=>$movies]);
    }

    public function add($movie_id=0)
    {
        $movies = new Movie();
        if($movie_id > 0) {
            $movies = $movies->where('id', $movie_id)->first();
        }
        return view('admin.Movie.addmovie',['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'duration'=>'required',
            'director'=>'required',
            'cast'=>'required',
            'releasedate'=>'required',
            'description' =>'required',
            'language' =>'required',
            'checkage'=>'required',
            'titleimg'=>'required',
            'trailerpath'=>'required',
        ]);
        $movie_id = $this->request->input('movie_id');
        $name = $this->request->input('name');
        $duration = $this->request->input('duration');
        $director = $this->request->input('director');
        $cast = $this->request->input('cast');
        $releasedate = $this->request->input('releasedate');
        $description = $this->request->input('description');
        $language = $this->request->input('language');
        $checkage = $this->request->input('checkage');
        $trailerpath=$this->request->input('trailerpath');
    

        if($request->hasfile('titleimg')){
            $file = $request->file('titleimg');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/titleimg/',$filename);
        }
        
        $data = [
            'movie_name' => $name, 
            'duration_min' => $duration, 
            'director' => $director, 
            'cast' => $cast, 
            'release_date' =>  date('Y-m-d', strtotime($releasedate)),
            'description' => $description,
            'language' => $language,
            'checkage' => $checkage,
            'trailer_link'=>$trailerpath,
            'title_image'=>$filename,
            'updated_at' => date('Y-m-d H:i:s')
        ];
            
         if($movie_id == 0) {
            $data['created_at'] = date('Y-m-d H:i:s');
            \DB::table('movies')->insert($data);
            $message = "Record added successfully.";
         }
         else {
            \DB::table('movies')
            ->where('id', $movie_id)
            ->update($data);
            $message = "Record updated successfully.";
         }

         return redirect('admin/movie')->with('success',$message);
       // return view('admin.Movie.addmovie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    public function delete($id){
        $movie = Movie::find($id);
        if($movie->delete()){
            return redirect('admin/movie')->with('success','Movie deleted successfully.');
        }
        else{
            return redirect('admin/movie')->with('error','Something went wrong. Please try again.');
        }
    }
    public function status($id){
        $movie = Movie::find($id);
        
        if($movie->isActive == 1){

            \DB::table('movies')
            ->where('id',$movie->id)
            ->update(['isActive' => '0']);

            return redirect('admin/movie')->with('success','Movie is Inactive');
        }
        else{
            
            \DB::table('movies')
            ->where('id',$movie->id)
            ->update(['isActive' => '1']);

            return redirect('admin/movie')->with('success','Movie is Active');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
