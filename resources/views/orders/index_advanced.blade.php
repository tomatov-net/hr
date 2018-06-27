@extends('layouts.app')
@section('content')
    <div class="col-md-12">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#overdue">Просроченные</a></li>
            <li><a data-toggle="tab" href="#current">Текущие</a></li>
            <li><a data-toggle="tab" href="#new">Новые</a></li>
            <li><a data-toggle="tab" href="#finished">Выполненные</a></li>
        </ul>

        <div class="tab-content">
            <div id="overdue" class="tab-pane fade in active">
                @include('orders.components.table', ['orders' => $overdue])
            </div>
            <div id="current" class="tab-pane fade">
                @include('orders.components.table', ['orders' => $current])

            </div>
            <div id="new" class="tab-pane fade">
                @include('orders.components.table', ['orders' => $new])

            </div>
            <div id="finished" class="tab-pane fade">
                @include('orders.components.table', ['orders' => $finished])
            </div>
        </div>
    </div>
@endsection