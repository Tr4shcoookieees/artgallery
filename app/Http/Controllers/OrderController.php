<?php

namespace App\Http\Controllers;

use App\Events\Order\OrderStatusUpdatedEvent;
use App\Events\Order\OrderStoredEvent;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Artwork;
use App\Models\Order;
use App\Models\Status;
use App\Notifications\OrderStored;
use App\Notifications\OrderStoredToAuthor;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index')->with('orders', Order::where('user_id', auth()->user()->id)->orderBy('status_id')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product = Artwork::where('id', $request->product_id)->first();

        return view('orders.create')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, Order $order)
    {
        if ($request->validated()) {
            $user = auth()->user();
            $product = Artwork::where('id', $request->product_id)->first();

            $order = $order->fill([
                'status_id' => 1,
                'user_id' => $user->id,
                'artwork_id' => $product->id,
                'author_id' => $product->author_id,
                'price' => $product->price,
            ]);

            $order->save();

            $product->quantity -= 1;

            if ($product->quantity == 0) {
                $info = $product->info;
                $info['tags']['is_sold'] = true;
                $product->info = $info;
                $product->save();
            }

            OrderStoredEvent::dispatch($order, $user, $product);

            $user->notify(new OrderStored($order));
            $product->author->user->notify(new OrderStoredToAuthor($order));

            return redirect()->route('order.index')->with('status', 'order-stored');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $tab = 'commerce';
        $page = 'orders';

        return view('orders.edit', compact('order', 'tab', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        if ($order->status_id == $request->get('status')) {
            return redirect()->back()->with(['status' => 'status-unchanged']);
        }

        $old_status = $order->status->name;
        if ($request->validated()) {
            $order->status_id = $request->get('status');
            $order->save();
        }

        $new_status = Status::find($request->get('status'))->name;
        OrderStatusUpdatedEvent::dispatch($order, $old_status, $new_status);

        return redirect()->back()->with(['status' => 'status-updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        if ($order->status->name != 'cancelled') {
            $order->status_id = 4;
            $order->save();
        }

        return redirect()->route('order.index')->with(['status' => 'order-cancelled', 'order_id' => $order->id]);
    }
}
