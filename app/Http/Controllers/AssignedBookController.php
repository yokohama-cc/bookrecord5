<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\AssignedBook;
use App\Book;
use App\Department;

class AssignedBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request->has('department_id')) 
            $department_id = $request->input('department_id');
        else 
            $department_id = Auth::user()->reader->department_id;
            
        list ($assigned_books,$books,$departments) = $this->getbooks($department_id);
        
        if ($request->fullUrl() === url('assigned_books/list'))
            $view = 'assigned_books.list';
        else 
            $view = 'assigned_books.index';
        
        
        return view($view,compact('assigned_books','books','departments','department_id'));
    }
    

    
    public function add(Request $request)
    {
        $assigned_book = $request->all();
        AssignedBook::create($assigned_book);
        $department_id = $request->input('department_id');
        list ($assigned_books,$books,$departments) = $this->getbooks($department_id);
        $request->replace(array('department_id' => $department_id));
        //return $this->index($request);
        return view('assigned_books.index',compact('assigned_books','books','departments','department_id'));
    }
    public function destroy(AssignedBook $assigned_book,Request $request)
    {
        $assigned_book->delete();
        
        $department_id = $request->input('department_id');
        list ($assigned_books,$books,$departments) = $this->getbooks($department_id);
        
        return view('assigned_books.index',compact('assigned_books','books','departments','department_id'));
    }
    
    public function search(Request $request)
    {
        $param = $request->input('param');
        $department_id = $request->input('department_id');
        if (empty($param))
        {
            
            list ($assigned_books,$books,$departments) = $this->getbooks($department_id);
        }
        else 
        {
        $key = '%'.$param.'%';
        $books = Book::where('name','like',$key)->orwhere('author','like',$key)->orwhere('company','like',$key)->get();
                
        $departments = Department::pluck('name','id');
        
        $books_id = $books->pluck('id');
        $assigned_books = AssignedBook::where('department_id',$department_id)->whereIn('book_id',$books_id)->get();
           
        $assigned_books_id = $assigned_books->pluck('book_id');
        $books = $books->whereNotIn('id',$assigned_books_id)->sortBy('id')->all();
        
        }
        return view('assigned_books.list',compact('assigned_books','books','departments','department_id'));
    }
    
    private function getbooks(Int $department_id)
    {
        $assigned_books = AssignedBook::where('department_id',$department_id)->orderBy('book_id')->get();
        $departments = Department::pluck('name','id');
        if (empty($assigned_books))
            $books = Book::all();
            else
            {
                $assigned_books_id = $assigned_books->pluck('book_id');
                $books = Book::whereNotIn('id',$assigned_books_id)->orderBy('id')->get();
            }
            return array ($assigned_books,$books,$departments);    
    }
    
}
