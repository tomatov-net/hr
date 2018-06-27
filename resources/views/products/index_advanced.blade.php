@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование продукта</th>
                <th>Наименование поставщика</th>
                <th>Цена <span class="small">(редактируется по клику)</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->vendor->name }}</td>
                    <td>
                        <input-hide input="{{ $product->price }}" csl="form-control" type="text" id="{{ $product->id }}"></input-hide>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection