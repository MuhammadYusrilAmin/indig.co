<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $products = Product::all();
        $sold = OrderDetail::all();

        return view(
            'profile.index',
            compact('orders'),
            compact('products'),
            compact('sold'),
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        if ($user) {
            return redirect('profile')->with('successfully', 'User updated successfully');
        } else {
            return redirect('profile')->with('error', 'User failed to updated');
        }
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->password = $request->oldpassword  && $request->newpassword = $request->confirmpassword) {
            $user->password = Hash::make($request->newpassword);
            $user->update();
        }

        if ($user) {
            return redirect('/')->with('successfully', 'User updated successfully');
        } else {
            return redirect('profile')->with('error', 'User failed to updated');
        }
    }

    public function changePhoto(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->file('featured_img') == "") {
            $user->gambar = $user->gambar;
        } else {
            $filename = time() . '.png';
            $request->file('featured_img')->move("user/", $fileName);
            $user->gambar = $filename;
        }
        $user->save();

        if ($user) {
            return redirect('/')->with('successfully', 'User updated successfully');
        } else {
            return redirect('profile')->with('error', 'User failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
