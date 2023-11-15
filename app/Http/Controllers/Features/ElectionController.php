<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\{Property,Feature,Election,Voter};

class ElectionController extends Controller
{
    public function index(Property $property){
           
        $featureId = 20; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
           return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        $elections = Property::find(Session::get('property_uuid'))->elections;

        return view('features.elections.index',[
            'elections' => $elections
        ]);
    }

    public function create(Property $property){
        return view('features.elections.create');
    }

    public function edit_step_1(Property $property, Election $election){
        return view('features.elections.edit-step-1',[
            'election' => $election
        ]);
    }

    public function create_step_2(Property $property, Election $election){
        return view('features.elections.create-step-2',[
            'election' => $election
        ]);
    }

    public function export_step_2(Property $property, Election $election){
        $folder_path = 'features.elections.export-step-2';

        $voters = Voter::where('election_id', $election->id)
        ->where('number_of_past_due_account','<',$election->number_of_months_behind_dues)
        ->get();

        $data = [
            'election' => $election,
            'voters' => $voters,
        ];


        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data);

        $pdf_name = str_replace(' ', '_', $property->property).'_'.Carbon::parse($election->date_of_election)->format('Y').'_Election_Voters.pdf';

        return $pdf->stream($pdf_name);
    }

    public function create_step_3(Property $property, Election $election){
        return view('features.elections.create-step-3',[
            'election' => $election
        ]);
    }

    public function export_step_3(Property $property, Election $election){
        $folder_path = 'features.elections.export-step-3';

        $candidates = Voter::where('election_id', $election->id)
        ->where('is_candidate',1)
        ->get();

        $data = [
            'election' => $election,
            'candidates' => $candidates,
        ];


        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data);

        $pdf_name = str_replace(' ', '_', $property->property).'_'.Carbon::parse($election->date_of_election)->format('Y').'_Election_Candidates_.pdf';

        return $pdf->stream($pdf_name);
    }

    public function create_step_4(Property $property, Election $election){
        return view('features.elections.create-step-4',[
            'election' => $election
        ]);
    }


    public function create_step_5(Property $property, Election $election){
        return view('features.elections.create-step-5',[
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
