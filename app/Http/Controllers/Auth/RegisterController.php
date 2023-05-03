<?php

namespace App\Http\Controllers\Auth;

use App\Department;
use App\Reader;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    protected function showRegistrationForm()
    {
        $departments = Department::pluck('name','id');
        return view('auth.register',compact('departments'));
    }
    
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            //ユーザ情報
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            //読者情報            
            'reader_name' => 'required|max:255',
            'school_number' => 'required|size:7|regex:/[0-9]{6}[A-Z]/',
            
        ]);
        // 項目名の日本語化
         $atributes = [
            'name' => trans('label.name'),
            'email' => trans('label.email'),
            'password' => trans('label.password'),            
            'reader_name'=>'ニックネーム',
            'school_number'=>'学生番号',
            
        ];
        
        $validator->addCustomAttributes($atributes);
        //カスタムエラーメッセージ
        $messages = ['school_number.regex' => ':attributeは数字６桁➕英大文字(例　171000E)の形式で入力してください。'];
        
        
        $validator->setCustomMessages($messages);
        
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'level' => 30
        ]);
    }

    
    protected function register(Request $request)
    {
        $input = $request->all();
        $this->validator($input)->validate();
        DB::transaction($output_user = function () use ($input) {
            $input_user = [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
                'level' => 30,                
            ];
            event(new Registered($user = $this->create($input_user)));
            $this->guard()->login($user);
            //読者情報
            Reader::create([
                'user_id' => $user['id'],
                'name' => $input['reader_name'],
                'school_number' => $input['school_number'],
                'admission_year' => $input['admission_year'],
                'department_id' => $input['department_id'],
            ]);
            return $user;
        });
         
        return $this->registered($request, $output_user)
        ?: redirect($this->redirectPath());
    }
    
}
