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
        // $featureId = 21;

        // $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        // $electionSubfeaturesArray = explode(",", $electionSubfeatures);

        // $propertyElection = Election::where('property_uuid', Session::get('property_uuid'))->whereYear('date_of_election', Carbon::now()->year);

        //  if($propertyElection->count() == 0){
        //      return view('HOA.election.management.election-new');
        // }else{

        //      $electionId = $propertyElection->pluck('id')->first();

        //     $electionYear = Carbon::parse(Election::find($electionId)->date_of_election)->year;

        //     return redirect('/property/'.$property->uuid.'/election/'.$electionYear.'/step-1')->with('success', 'Changes saved!');
        // }

        $elections = Property::find(Session::get('property_uuid'))->elections;

        return view('HOA.election.management.list-of-elections',[
            'elections' => $elections
        ]);

    }

    public function createStep1(Property $property, $year){
        $featureId = 21;

        $electionSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $electionSubfeaturesArray = explode(",", $electionSubfeatures);

        $propertyElection = Election::where('property_uuid', Session::get('property_uuid'))->whereYear('date_of_election', Carbon::now()->year);

                // ddd(Carbon::now()->year);

        if($propertyElection->count() == 0){
            $election = Election::create(
            [
                'time_limit' => 1, //hour
                'number_of_months_behind_dues' => 2,
                'property_uuid' => Session::get('property_uuid'),
                'user_id' => auth()->user()->id,
                'date_of_election' => Carbon::now(),
            ]);
        }else{
            $electionId = $propertyElection->pluck('id')->first();

            $election = Election::find($electionId);
        }



         return view('HOA.election.management.policy-form',[
            'year' => $year,
            'electionSubfeaturesArray' => $electionSubfeaturesArray,
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

    public function createStep2(Property $property, $year){
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
