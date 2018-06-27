<?php

namespace App\Http\Controllers;

use App\Notifications\OrderIsFinished;
use App\User;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index()
    {
        $result = [
            'orders' => Order::all(),
        ];

        return view('orders.index', $result);
    }

    public function index_advanced()
    {
        $result = [
            'overdue' => Order::overdue()->get(),
            'current' => Order::current()->get(),
            'new' => Order::new()->get(),
            'finished' => Order::finished()->get(),
        ];

        return view('orders.index_advanced', $result);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'client_email' => 'required|email',
            'partner_id' => 'required|integer',
        ]);

        $order = Order::find($id);
        $order->status = $request->status;
        $order->client_email = $request->client_email;
        $order->partner_id = $request->partner_id;
        $order->save();

        if($order->status == 20){
            foreach ($order->products as $product) {
                $users[] = $product->vendor;
            }
            $users[] = $order->partner;
//            $users = new User();
//            $users->email = 'some-fake-email-to-test@gmail.com';
            Notification::send($users, new OrderIsFinished($order));
        }

        return back();
    }
}
