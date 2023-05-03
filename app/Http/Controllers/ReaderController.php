<?php

namespace App\Http\Controllers;

use App\Reader;
use Illuminate\Http\Request;
use App\Http\Requests\ReaderRequest;
use App\Department;

class ReaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $readers = Reader::all();
        return view('readers.index',compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('name','id');
        return view('readers.form',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReaderRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        Reader::create($input);
        
        return redirect('readers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function show(Reader $reader)
    {
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function edit(Reader $reader)
   
    {
        $this->authorize('update_and_delete', $reader);
        $departments = Department::pluck('name','id');
        return view('readers.form', compact('reader','departments'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function update(ReaderRequest $request, Reader $reader)
    {
        $this->authorize('update_and_delete', $reader);
        $input = $request->all();        
        $reader->update($input);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reader  $reader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reader $reader)
    {
        $this->authorize('update_and_delete', $reader);
        $reader->delete();
        return redirect ('readers');
    }
}
