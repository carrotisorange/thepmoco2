<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Feature;
use App\Models\Election;
use Session;
use Carbon\Carbon;

class ElectionController extends Controller
{
    public function index(Property $property){

        $elections = Property::find(Session::get('property_uuid'))->elections;

        return view('elections.index',[
            'elections' => $elections
        ]);
    }

    public function create(Property $property){
        return view('elections.create');
    }

    public function edit_step_1(Property $property, Election $election){
        return view('elections.edit-step-1',[
            'election' => $election
        ]);
    }

    public function create_step_2(Property $property, Election $election){
        return view('elections.create-step-2',[
            'election' => $election
        ]);
    }

    public function create_step_3(Property $property, Election $election){
        return view('elections.create-step-3',[
            'election' => $election
        ]);
    }
















    public function storeStep1(Request $request, Property $property, $electionId){

        Election::where('id', $electionId)
        ->update([
            'date_of_election' => $request->date_of_election,
            'time_limit' => $request->time_limit,
            'number_of_months_behind_dues' => $request->number_of_months_behind_dues,
            'is_proxy_voting_allowed' => $request->is_proxy_voting_allowed,
            'other_policies' => $request->other_policies
        ]);

        $electionYear = Carbon::parse(Election::find($electionId)->date_of_election)->year;

        return redirect('/property/'.$property->uuid.'/election/'.$electionYear.'/step-2')->with('success', 'Changes saved!');
    }

    public function createStep2(Property $property, Election $election){
        $featureId = 21;

        $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $electionSubfeaturesArray = explode(",", $electionSubfeatures);

        $electionId = Carbon::parse(Election::whereYear('date_of_election',$year)->pluck('id')->first());


         return view('HOA.election.management.candidates',[
            'year' => $year,
            'electionSubfeaturesArray' => $electionSubfeaturesArray,
            'election' => $election
         ]);
    }


    public function createStep3(Property $property, $year){
        $featureId = 21;

        $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $electionSubfeaturesArray = explode(",", $electionSubfeatures);

         return view('HOA.election.management.candidates',[
            'year' => $year,
            'electionSubfeaturesArray' => $electionSubfeaturesArray
         ]);
    }

    public function createStep4(Property $property, $year){
        $featureId = 21;

        $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $electionSubfeaturesArray = explode(",", $electionSubfeatures);
         return view('HOA.election.management.ballot-form',[
            'year' => $year,
            'electionSubfeaturesArray' => $electionSubfeaturesArray
         ]);
    }

    public function createStep5(Property $property, $year){
        $featureId = 21;

        $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $electionSubfeaturesArray = explode(",", $electionSubfeatures);

         return view('HOA.election.management.qualified-voters',[
            'year' => $year,
            'electionSubfeaturesArray' => $electionSubfeaturesArray
         ]);
    }

    public function createStep6(Property $property, $year){
        $featureId = 21;

        $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $electionSubfeaturesArray = explode(",", $electionSubfeatures);

         return view('HOA.election.management.results',[
            'year' => $year,
            'electionSubfeaturesArray' => $electionSubfeaturesArray
         ]);
    }
}
