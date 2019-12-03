<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Order::paginate(5);
        $keyword = $request->get('id');
        if ($keyword) {
            $orders = Order::where("id", "LIKE", "%$keyword%")->paginate(5);
        }
        return view('order.index', compact('orders'));
    }

    public function menampilkanSemuaOrder()
    {
        $user = Auth::user();
        $orders = Order::where("user_id", "=", $user->id)->paginate(10);

//        return $orders[1]->cameras[0]->name;
        return view('order-detail', compact('user', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datas = $request->all();
        $datas['user_id'] = Auth::user()->id;
        $datas['status'] = "process";
        $orders = Order::create($datas);
        $orders->lapangan()->attach($request['lapangan_id']);
        return redirect(route('pembayaran'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    public function userEdit($id)
    {
        $order = Order::findOrFail($id);
        return view('order-upload', compact('order'));
    }

    public function userUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('bukti')){
            $file = Storage::disk('public')->put('bukti_transfer', $request->bukti);
            $data['bukti'] = $file;
        }
        $order->update($data);
        return redirect(route('showOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $datas = $request->all();
        $order->update($datas);
        return redirect()->back()->with('status', 'Order Edited');
//        return redirect(route('order.edit', compact('id')))->with('status', 'Order Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
