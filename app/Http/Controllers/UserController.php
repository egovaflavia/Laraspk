<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('cek_login');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.user.index', [
            'data' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.user.form', [
            'data' => User::latest('id', 'DESC')->take(3)->get(),
            'route' => 'user.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
            ->route('user.create')
            ->with('message', 'Data berhasil disimpan')
            ->withErrors($validator)
            ->withInput();
        }
        $request->get('password');
        $user           = new User();
        $user->username = $request->username;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->level    = $request->level;
        $user->save();

        return redirect()
            ->route('user.index')
            ->with('message', 'Data berhasil disimpan')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('page.user.form',[
            'row' => $user,
            'data' => User::latest('id', 'DESC')->take(3)->get(),
            'route' => 'user.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->password != "") {
            $user = new User();
            $user->username = $request->username;
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->level    = $request->level;
            $user->save();
        }else{
            $input = $request->except('password');
            User::findOrFail($id)->update($input);
        }
        User::findOrFail($id)->update($request->all());
        return redirect()
            ->route('user.index')
            ->with('message', 'Data berhasil di update');
    }

    /**
     * Remove theBbrp  specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)
            ->delete();
        return redirect()
            ->route('user.index')
            ->with('message', 'Data berhasil di hapus');
    }
}
