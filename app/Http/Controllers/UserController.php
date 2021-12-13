<?php

namespace App\Http\Controllers;
use App\Repository\IUserRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $user;
    
    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function index(){

        $users = $this->user->getAllUsers();
        $users->load('country');
        return View::make('user.index', compact('users'));
        
    }

    public function create(){
        return View::make('user.edit');

    }

    public function show($id){

        $user = $this->user->getUserById($id);
        return View::make('user.edit', compact('user'));

    }
    public function store(Request $request, $id = null){

        $collection = $request->except(['_token','_method']);

        if( ! is_null( $id ) ) 
        {
            $this->user->createOrUpdate($id, $collection);
        }
        else
        {
            $this->user->createOrUpdate($id = null, $collection);
        }

        return redirect()->route('user.list');

    }

 

    public function update(Request $request,$id){
        $this->user->deleteUser($id);

        return redirect()->route('user.list');


    }
}
