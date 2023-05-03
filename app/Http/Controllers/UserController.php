<?php

namespace App\Http\Controllers;

use App\Department;
use App\Reader;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit_password(User $user)
    {
        $this->authorize('update_and_delete', $user);
        return view('users.password', compact('user'));
    }
    public function update_password(UserRequest $request, User $user)
    {
        $this->authorize('update_and_delete', $user);
        $input = $request->all();
        $user->password = bcrypt($input['password']);
        $user->save();
        return redirect('home');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('system_admin');
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('system_admin');
        $departments = Department::pluck('name','id');
        return view('users.form', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('system_admin');
        $input = $request->all();
        
        DB::transaction(function () use ($input) {
            $input['password'] = bcrypt('secret');
            $input['level'] = 30;
            $user = User::create($input);
            
            //読者情報
            Reader::create(
                [
                    'user_id' => $user['id'],
                    'name' => $input['reader_name'],
                    'school_number' => $input['school_number'],
                    'admission_year' => $input['admission_year'],
                    'department_id' => $input['department_id'],
                ]);
            return; });        
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('system_admin');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update_and_delete', $user);
        $user['reader_name'] = $user->reader->name;
        $user['admission_year'] = $user->reader->admission_year;
        $user['school_number'] = $user->reader->school_number;
        $user['department_id'] = $user->reader->department_id;
        $departments = Department::pluck('name','id');
        return view('users.form', compact('user','departments'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update_and_delete', $user);
        $input = $request->all();
        
        DB::transaction(function () use ($input,$user) {
            $user->update($input);
            
            //読者情報
            $reader = Reader::where('id',$user->reader->id)->update(
                [
                'name' => $input['reader_name'],
                'school_number' => $input['school_number'],
                'admission_year' => $input['admission_year'],
                'department_id' => $input['department_id'],
                ]); 
            return; });
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('system_admin');
        DB::transaction(function () use ($user) {
            $user->reader()->delete();
            $user->delete();
            return; });
        
        return redirect ('users');
    }
}
