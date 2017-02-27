<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;

class BandsController extends Controller
{
    //
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
        $details['bands_page'] = 'active';
        $details['page_title'] = 'Bands';
        $details['page_description'] = 'Music bands';

        return response() -> view('bands',['details' => $details]);
//        return view('bands');

    }

    public function addView(){
        $home_controller = new HomeController();
        $details = $home_controller -> getDetails();
        $details['page_title'] = 'Add Band';
        $details['page_description'] = 'Add a band to application';
        return response() -> view('addBand',['details' => $details]);
    }

    public function updateView($id){
        $home_controller = new HomeController();
        $details = $home_controller -> getDetails();
        $details['page_title'] = 'Update Band';
        $details['page_description'] = 'Update the band';
        $band = $this->show($id);

        return response() -> view('updateBand',['band' => $band,'details'=>$details]);

    }

    public function getBands(){
        $band = new Band();

        $bands = $band -> all();

        $bands = json_decode($bands,true);

        $bands = $this->suitBrandsResponse($bands);

        return $bands;
    }

    public function show($id){

        $bands = new Band();

        $band = $bands -> find($id);

        $band = json_decode($band,true);

        return $band;
    }

    public function suitBrandsResponse($data){

        foreach($data as $key=>$item){
            $data[$key]['still_active'] = $item['still_active'] == true ? 'Yes' : 'No';
        }

        return $data;
    }

    public function store(Request $request){

        $band = new Band();

        $band -> name = $request->input('name') ? $request->input('name') : null;
        $band -> start_date = $request->input('start_date') ? $request->input('start_date') : null;
        $band -> website = $request->input('website') ? $request->input('website') : null;
        $band -> still_active = $request->input('still_active') ? $request->input('still_active') : 0;

        $band -> save();

        return redirect('bands');

    }

    public function update(Request $request,$id){

        $bands = new Band();

        $band = $bands->find($id);
        $band -> name = $request->input('name') ? $request->input('name') : null;
        $band -> start_date = $request->input('start_date') ? $request->input('start_date') : null;
        $band -> website = $request->input('website') ? $request->input('website') : null;
        $band -> still_active = $request->input('still_active') ? $request->input('still_active') : 0;

        $band -> save();

        return redirect('bands');

    }

    public function destroy($id){

        $bands = new Band();

        $band = $bands->find($id);

        $band->delete();

    }
}
