<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Members;
use App\Model\Quote;
use Illuminate\Support\Facades\View;
use  Input, Redirect, Session, Validator, DB, Mail,File, Request,Response,URL,Form;
use App\Model\Members as MembersModel, App\Model\People as PeopleModel, App\Model\Company as CompanyModel,  App\Model\Type as TypeModel;
class CompanyController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter(function () {
            if (!Session::has('user_id')) {
                return Redirect::route('user.login');
            }
        });
    }
    public function addCompany(){
        $user_id = Session::get('user_id');
        $param['member'] = MembersModel::find($user_id);
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['type'] = TypeModel::whereRaw(true)->orderBy('type','asc')->get();
        $param['people'] = PeopleModel::whereRaw(true)->orderBy('firstName','asc')->get();
        $param['company'] = CompanyModel::all();
        return View::make('user.company.add')->with($param);
    }
    public function storeCompany(){
        if(Input::has('companyId')) {
            $rules = [
                'companyName' => 'required',
            ];
        }else{
            $rules = [
                'companyName' => 'required |unique:company',
            ];
        }
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if(Input::has('companyId')){
                $companyId = Input::get('companyId');
                $company =  CompanyModel::find($companyId);
                $company->companyName =Input::get('companyName');
                $company->typeId =Input::get('type');
                $company->phone =Input::get('phone');
                $company->email =Input::get('email');
                $company->website =Input::get('website');
                $company->mainPeopleId =Input::get('mainPeople');
                $company->save();
                $alert['type']='success';
                $alert['msg'] ="Company has been updated successfully";
                return Redirect::route('user.company.editCompany', $companyId)->with('alert', $alert);
            }else{
                $company = new CompanyModel;
                $company->companyName =Input::get('companyName');
                $company->typeId =Input::get('type');
                $company->phone =Input::get('phone');
                $company->email =Input::get('email');
                $company->website =Input::get('website');
                $company->mainPeopleId =Input::get('mainPeople');
                $company->save();
                $alert['type']='success';
                $alert['msg'] ="Company has been saved successfully";
                return Redirect::route('user.company.addCompany')->with('alert', $alert);
            }


        }
    }
    public function editCompany($id){
        $user_id = Session::get('user_id');
        $param['member'] = MembersModel::find($user_id);
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['type'] = TypeModel::whereRaw(true)->orderBy('type','asc')->get();
        $param['people'] = PeopleModel::whereRaw(true)->orderBy('firstName','asc')->get();
        $param['company'] = CompanyModel::all();
        $param['companyItem'] = CompanyModel::find($id);
        return View::make('user.company.edit')->with($param);
    }
}