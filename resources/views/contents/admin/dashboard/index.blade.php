@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        {{ alertbs_form($errors) }}
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Users</h4>
                </div>
                <div class="card-body">
                    {{auth()->user()->count()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection
