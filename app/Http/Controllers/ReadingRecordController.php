<?php

namespace App\Http\Controllers;

use App\Book;
use App\Department;
use App\ReadingRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reader;
use App\Http\Requests\ReadingRecordRequest;

class ReadingRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function search(Request $request)
    {
        $page = $request->session()->pull('page');
        $department_id = $request->input('department_id');
        $departments = Department::pluck('name','id');
        $param = $request->input('param');
        $key = '%'.$param.'%';
        $readers_id = Reader::where('department_id',$department_id)->pluck('id');
        $books_id = Book::where('name','like',$key)->pluck('id');
        $reading_records = ReadingRecord::whereIn('book_id',$books_id)->whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        
        return view('reading_records.index',compact('reading_records','departments','department_id'));
    }
    
    public function searchbyreader(Request $request)
    {
        $page = $request->session()->pull('page');
        $departments = Department::pluck('name','id');
        $department_id = Auth::user()->reader->department_id;
        $param = $request->input('paramreader');
        $key = '%'.$param.'%';
        $readers_id = Reader::where('name','like',$key)->pluck('id');
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        
        return view('reading_records.index',compact('reading_records','departments','department_id'));
    }
    
    public function booklist(Request $request, $book_id)
    {
        $departments = Department::pluck('name','id');
        $department_id = Auth::user()->reader->department_id;
        $page = $request->session()->pull('page');
        $reading_records = ReadingRecord::where('book_id',$book_id)->paginate(10,array('*'),'page',$page);
        return view('reading_records.index',compact('reading_records','departments','department_id'));
    }
    
    public function readerlist(Request $request)
    {
        //$reader_id = Auth::user()->reader->id;
        $departments = Department::pluck('name','id');
        $department_id = Auth::user()->reader->department_id;
        $page = $request->session()->pull('page');
        $readers_id = Reader::where('department_id',$department_id)->pluck('id');
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        return view('reading_records.index',compact('reading_records','departments','department_id'));
    }
 
    public function add($book_id)
    {
        $book = Book::find($book_id);
        $reader = Reader::find(Auth::user()->reader->id);
        return view('reading_records.add',compact('book','reader'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->session()->pull('page');
        $reading_records = ReadingRecord::paginate(10,array('*'),'page',$page);
        return view('reading_records.index',compact('reading_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::pluck('name','id');
        $readers = Reader::pluck('name','id');
        return view('reading_records.form',compact('books','readers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReadingRecordRequest $request)
    {
        $reading_record = $request->all();
        ReadingRecord::create($reading_record);
        //$url = 'reading_records/readerlist/'.$reading_record['reader_id'];
        return redirect('reading_records/readerlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReadingRecord  $reading_record
     * @return \Illuminate\Http\Response
     */
    public function show(ReadingRecord $reading_record)
    {
        return view('reading_records.show', compact('reading_record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReadingRecord  $reading_record
     * @return \Illuminate\Http\Response
     */
    public function edit(ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        //$books = Book::pluck('name','id');
        //$readers = Reader::pluck('name','id');
        $book = Book::find($reading_record->book_id);
        $reader = Reader::find(Auth::user()->reader->id);        
        return view('reading_records.add',compact('reading_record','book','reader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReadingRecord  $reading_record
     * @return \Illuminate\Http\Response
     */
    public function update(ReadingRecordRequest $request, ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        $input = $request->all();
        
        $reading_record->update($input);
        //$url = 'reading_records/readerlist/'.$reading_record['reader_id'];
        return redirect('reading_records/readerlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReadingRecord  $reading_record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        $reading_record->delete();
        $page = $request->input('page');
        return redirect('reading_records/readerlist');
    }
}
