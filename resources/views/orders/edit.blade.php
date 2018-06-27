@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <form action="/orders/update/{{ $order->id }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Client Email</label>
                        <input name="client_email" required class="form-control" value="{{ $order->client_email }}" type="email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Partner</label>
                        <select name="partner_id" required name="" id="" class="form-control">
                            @foreach(\App\Partner::all() as $partner)
                                <option {{ $partner->id == $order->partner->id ? 'selected' : ''}} value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" required name="" id="" class="form-control">
                            @foreach(\App\Order::getStatuses() as $key => $status)
                                <option {{ $order->status == $key ? 'selected' : ''}} value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Order items</label>
                        @foreach($order->products as $product)
                            <p>{{ $product->name }}: {{ $product->pivot->quantity }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Order price</label>
                        <p>{{ $order->calculateCost() }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pull-right">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection

