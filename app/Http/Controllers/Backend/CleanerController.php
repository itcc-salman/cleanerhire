<?php

namespace App\Http\Controllers\Backend;


use App\Cleaner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class CleanerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('backend.cleaners.index');
    }

    public function add(Request $request)
    {
        return view('backend.cleaners.add');
    }

    public function getAllCleaners(Request $request)
    {
        $data = array();
        $cleaners = Cleaner::all();

        $data['code'] = 200;
        $data['data'] = $cleaners;
        return response()->json($data);
    }

    public function postCreate(Request $request)
    {
        $data = array();
        return response()->json($data);

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->role = 'cleaner';
        $password = 'cleaner@123';
        $user->password = Hash::make($password);
        // $user->save();

        $cleaner = new Cleaner();
        $cleaner->user_id = $user->id;
        $cleaner->first_name = $request->get('first_name');
        $cleaner->last_name = $request->get('last_name');
        $cleaner->phone =  $request->has('phone') ? $request->get('phone') : null;
        $cleaner->phone_secondary =  $request->has('phone_secondary') ? $request->get('phone_secondary') : null;
        $cleaner->email =  $request->has('email') ? $request->get('email') : null;
        $cleaner->company_name =  $request->has('company_name') ? $request->get('company_name') : null;
        $cleaner->website =  $request->has('website') ? $request->get('website') : null;
        $cleaner->address_line_1 =  $request->has('address_line_1') ? $request->get('address_line_1') : null;
        $cleaner->address_line_2 =  $request->has('address_line_2') ? $request->get('address_line_2') : null;
        $cleaner->city =  $request->has('city') ? $request->get('city') : null;
        $cleaner->state =  $request->has('state') ? $request->get('state') : null;
        $cleaner->postcode =  $request->has('postcode') ? $request->get('postcode') : null;
        $cleaner->country =  $request->has('country') ? $request->get('country') : null;
        $cleaner->tfn =  $request->has('tfn') ? $request->get('tfn') : null;
        $cleaner->abn =  $request->has('abn') ? $request->get('abn') : null;
        $cleaner->visa_status =  $request->has('visa_status') ? $request->get('visa_status') : null;
        $cleaner->nationality =  $request->has('nationality') ? $request->get('nationality') : null;
        $cleaner->language =  $request->has('language') ? $request->get('language') : null;
        $cleaner->gender =  $request->has('gender') ? $request->get('gender') : null;
        $cleaner->date_of_birth =  $request->has('date_of_birth') ? $request->get('date_of_birth') : null;
        $cleaner->bank_name =  $request->has('bank_name') ? $request->get('bank_name') : null;
        $cleaner->bsb =  $request->has('bsb') ? $request->get('bsb') : null;
        $cleaner->account_no =  $request->has('account_no') ? $request->get('account_no') : null;
        $cleaner->account_name =  $request->has('account_name') ? $request->get('account_name') : null;
        $cleaner->doc_driving_licence =  $request->has('doc_driving_licence') ? $request->get('doc_driving_licence') : null;
        $cleaner->doc_medicare_card =  $request->has('doc_medicare_card') ? $request->get('doc_medicare_card') : null;
        $cleaner->doc_passport =  $request->has('doc_passport') ? $request->get('doc_passport') : null;
        $cleaner->doc_bank_statement =  $request->has('doc_bank_statement') ? $request->get('doc_bank_statement') : null;
        $cleaner->doc_utility_bill =  $request->has('doc_utility_bill') ? $request->get('doc_utility_bill') : null;
        $cleaner->doc_certifications =  $request->has('doc_certifications') ? $request->get('doc_certifications') : null;
        $cleaner->doc_police_check =  $request->has('doc_police_check') ? $request->get('doc_police_check') : null;
        $cleaner->comments =  $request->has('comments') ? $request->get('comments') : null;
        $cleaner->status = $request->has('status') ? $request->get('status') : 1;
        $cleaner->created_by =  $request->user()->id;
        $cleaner->updated_by =  $request->user()->id;
        // $cleaner->save();

        $data['code'] = 200;
        $data['cleaner'] = $cleaner;
        $data['message'] = 'Cleaner created successfully..!';
        return response()->json($data);
    }

    public function edit(Request $request)
    {
        $data = array();
        $cleaner = Cleaner::find($request->id);
        if(!$cleaner){
            $data['code'] = 400;
            $data['cleaner'] = null;
            $data['message'] = 'Cleaner not Found..!';
        }
        $data['code'] = 200;
        $data['cleaner'] = $cleaner;
        return response()->json($data);
    }

    public function postUpdate(Request $request)
    {
        $data = array();
        $data['code'] = 400;
        $data['data'] = null;
        $data['message'] = 'Invalid Cleaner';
        $id = $request->has('id') ? $request->get('id') : null;
        if($id){
            $cleaner = Cleaner::find($id);
            if($cleaner){

                $user = User::find($cleaner->user_id);
                $user->first_name = $request->has('first_name') ? $request->get('first_name') : $user->first_name;
                $user->last_name = $request->has('last_name') ? $request->get('last_name') : $user->last_name;
                $user->save();

                $cleaner->first_name = $request->has('first_name') ? $request->get('first_name') : $cleaner->first_name;
                $cleaner->last_name = $request->has('last_name') ? $request->get('last_name') : $cleaner->last_name;
                $cleaner->phone =  $request->has('phone') ? $request->get('phone') : $cleaner->phone;
                $cleaner->phone_secondary =  $request->has('phone_secondary') ? $request->get('phone_secondary') : $cleaner->phone_secondary;
                // $cleaner->email =  $request->has('email') ? $request->get('email') : $cleaner->email;
                $cleaner->company_name =  $request->has('company_name') ? $request->get('company_name') : $cleaner->company_name;
                $cleaner->website =  $request->has('website') ? $request->get('website') : $cleaner->website;
                $cleaner->address_line_1 =  $request->has('address_line_1') ? $request->get('address_line_1') : $cleaner->address_line_1;
                $cleaner->address_line_2 =  $request->has('address_line_2') ? $request->get('address_line_2') : $cleaner->address_line_2;
                $cleaner->city =  $request->has('city') ? $request->get('city') : $cleaner->city;
                $cleaner->state =  $request->has('state') ? $request->get('state') : $cleaner->state;
                $cleaner->postcode =  $request->has('postcode') ? $request->get('postcode') : $cleaner->postcode;
                $cleaner->country =  $request->has('country') ? $request->get('country') : $cleaner->country;
                $cleaner->tfn =  $request->has('tfn') ? $request->get('tfn') : $cleaner->tfn;
                $cleaner->abn =  $request->has('abn') ? $request->get('abn') : $cleaner->abn;
                $cleaner->visa_status =  $request->has('visa_status') ? $request->get('visa_status') : $cleaner->visa_status;
                $cleaner->nationality =  $request->has('nationality') ? $request->get('nationality') : $cleaner->nationality;
                $cleaner->language =  $request->has('language') ? $request->get('language') : $cleaner->language;
                $cleaner->gender =  $request->has('gender') ? $request->get('gender') : $cleaner->gender;
                $cleaner->date_of_birth =  $request->has('date_of_birth') ? $request->get('date_of_birth') : $cleaner->date_of_birth;
                $cleaner->bank_name =  $request->has('bank_name') ? $request->get('bank_name') : $cleaner->bank_name;
                $cleaner->bsb =  $request->has('bsb') ? $request->get('bsb') : $cleaner->bsb;
                $cleaner->account_no =  $request->has('account_no') ? $request->get('account_no') : $cleaner->account_no;
                $cleaner->account_name =  $request->has('account_name') ? $request->get('account_name') : $cleaner->account_name;
                $cleaner->doc_driving_licence =  $request->has('doc_driving_licence') ? $request->get('doc_driving_licence') : $cleaner->doc_driving_licence;
                $cleaner->doc_medicare_card =  $request->has('doc_medicare_card') ? $request->get('doc_medicare_card') : $cleaner->doc_medicare_card;
                $cleaner->doc_passport =  $request->has('doc_passport') ? $request->get('doc_passport') : $cleaner->doc_passport;
                $cleaner->doc_bank_statement =  $request->has('doc_bank_statement') ? $request->get('doc_bank_statement') : $cleaner->doc_bank_statement;
                $cleaner->doc_utility_bill =  $request->has('doc_utility_bill') ? $request->get('doc_utility_bill') : $cleaner->doc_utility_bill;
                $cleaner->doc_certifications =  $request->has('doc_certifications') ? $request->get('doc_certifications') : $cleaner->doc_certifications;
                $cleaner->doc_police_check =  $request->has('doc_police_check') ? $request->get('doc_police_check') : $cleaner->doc_police_check;
                $cleaner->comments =  $request->has('comments') ? $request->get('comments') : $cleaner->comments;
                $cleaner->status = $request->has('status') ? $request->get('status') : 1;
                $cleaner->updated_by =  $request->user()->id;
                $cleaner->save();

                $data['code'] = 200;
                $data['cleaner'] = $cleaner;
                $data['message'] = 'Cleaner updated successfully..!';
            }
        }
        return response()->json($data);

    }

    public function postDelete(Request $request)
    {
        $data = array();
        $id = $request->has('id') ? $request->get('id') : null;
        $cleaner = Cleaner::find($id);

        if(!$cleaner){
            $data['code'] = 400;
            $data['data'] = null;
            $data['message'] = 'Invalid Cleaner';
        }else{
            $cleaner->delete();
            $data['code'] = 200;
            $data['message'] = 'Cleaner deleted successfully..!';
        }
        return response()->json($data);
    }

}
