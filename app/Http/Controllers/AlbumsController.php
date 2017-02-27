<?php

namespace App\Http\Controllers;

use App\Album;
use App\Band;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
 * Create a new controller instance.
 *
 * @return void
 */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $home_controller = new HomeController();
        $details = $home_controller -> getDetails();
        $details['albums_page'] = 'active';
        $details['page_title'] = 'Albums';
        $details['page_description'] = 'Music albums';

        $band_names = $this->getBandNames();

        return response() -> view('albums',['band_names' => $band_names,'details'=>$details]);

    }

    public function getAlbums($band_name = 'none'){
        $album = new Album();

        if($band_name == 'none'){
        $albums = $album -> with(array('band'=>function($query){
            $query->select('id','name');
        }))-> get();
        }
        else{
            $albums = $this->getAlbumsSortedByBand($band_name);
        }

        $albums = json_decode($albums,true);

        return $albums;
    }

    public function addView(){

        $home_controller = new HomeController();
        $details = $home_controller -> getDetails();
        $details['page_title'] = 'Add Album';
        $details['page_description'] = 'Add an album';

        $band_names = $this->getBandNames();

        return response() -> view('addAlbum',['band_names' => $band_names,'details'=>$details]);

    }

    public function getBandNames(){
        $band_controller = new BandsController();
        $bands = $band_controller->getBands();

        $band_names = array();

        foreach($bands as $item){
            $band_names[] = $item['name'];
        }

        return $band_names;
    }
    public function updateView($id){

        $album = $this->show($id);
        $band_names = $this->getBandNames();

        $bands = new Band();
        $band = $bands->find($album->band_id);
        $array_key = array_search($band->name,$band_names);
        $selected_band = $array_key;

        $home_controller = new HomeController();
        $details = $home_controller -> getDetails();
        $details['page_title'] = 'Update Album';
        $details['page_description'] = 'Update the album';

        $album = json_decode($album,true);

        return response() -> view('updateAlbum',['album' => $album,'band_selected'=>$selected_band,'band_names'=>$band_names,'details'=>$details]);

    }

    public function suitAlbumsResponse($data){

        foreach($data as $key=>$item){
            $data[$key]['still_active'] = $item['still_active'] == true ? 'Yes' : 'No';
        }

        return $data;
    }

    public function show($id){
        $albums = new Album();

        $album = $albums -> find($id);

        return $album;
    }
    public function getAlbumsSortedByBand($band_name){

        $bands = new Band();

        if($band = $bands->where('name',$band_name)->select('id')->get()->first())
        {
            $album = new Album();

            $albums = $album-> with(array('band'=>function($query){
                $query->select('id','name');
            })) -> where('band_id',$band->id) -> get();
        }else{
            $albums = array();
        }

        return $albums;

    }

    public function store(Request $request){

        $band_name = $this->getBandNames()[$request->input('band')];

        $bands = new Band();
        $album = new Album();

        $band = $bands->where('name',$band_name)->select('id')->get()->first();

        $album -> band_id = $band->id ? $band->id : null;
        $album -> name = $request->input('name') ? $request->input('name') : null;
        $album -> recorded_date = $request->input('recorded_date') ? $request->input('recorded_date') : null;
        $album -> release_date = $request->input('release_date') ? $request->input('release_date') : null;
        $album -> number_of_tracks = $request->input('number_of_tracks') ? $request->input('number_of_tracks') : null;
        $album -> label = $request->input('label') ? $request->input('label') : null;
        $album -> producer = $request->input('producer') ? $request->input('producer') : null;
        $album -> genre = $request->input('genre') ? $request->input('genre') : null;

        if($album -> save()){
            return redirect('albums');
        }else{
            return 'Error';
        }

    }

    public function update(Request $request,$id){

        $band_name = $this->getBandNames()[$request->input('band')];

        $bands = new Band();
        $albums = new Album();

        $band = $bands->where('name',$band_name)->select('id')->get()->first();

        $album = $albums -> find($id);

        $album -> band_id = $band->id ? $band->id : null;
        $album -> name = $request->input('name') ? $request->input('name') : null;
        $album -> recorded_date = $request->input('recorded_date') ? $request->input('recorded_date') : null;
        $album -> release_date = $request->input('release_date') ? $request->input('release_date') : null;
        $album -> number_of_tracks = $request->input('number_of_tracks') ? $request->input('number_of_tracks') : null;
        $album -> label = $request->input('label') ? $request->input('label') : null;
        $album -> producer = $request->input('producer') ? $request->input('producer') : null;
        $album -> genre = $request->input('genre') ? $request->input('genre') : null;

        if($album -> save()){
            return redirect('albums');
        }else{
            return 'Error';
        }

    }

    public function destroy($id){

        $albums = new Album();

        $album = $albums -> find($id);

        $album->delete();

    }
}
