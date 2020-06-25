<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    // get listing
    public function index(Request $request)
    {
        // dd($request->all());
        // $users = User::where(field, value)->get();
        // $users = User::orderBy(field, direction)->get();
        // $users = User::orderBy(field, direction)->take(number_of_records)->get();
        // $users = User::orderBy(field, direction)->take(number_of_records)->skip(skip_number_of_records)->get();
        $builder = $this->model;

        if($request->get('name')) {
            $builder = $builder->where('name', 'LIKE', '%'.$request->get('name').'%');
        }

        if($request->get('email')) {
            $builder = $builder->where('email', 'LIKE', '%'.$request->get('email').'%');
        }

        $sortField = $request->get('sort_field', 'id');
        $sortOrder = $request->get('sort_order', 'asc');
        $users = $builder->orderBy($sortField, $sortOrder)->paginate(10);

        return $users;
    }

    // create item
    public function create()
    {

    }

    // update item
    public function update()
    {

    }

    // delete item
    public function delete()
    {

    }

    // get single item
    public function show()
    {

    }
}
