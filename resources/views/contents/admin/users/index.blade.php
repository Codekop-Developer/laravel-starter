@extends('layouts.app')
@section('content')
    @livewire('admin.users.index',[
        'users_id' => $users->id,
        'name' => $users->name,
        'email'=> $users->email,
        'avatar' => $users->avatar,
        'phone' => $users->phone,
        'address' => $users->address,
        'roles' => $users->roles,
        'active' => $users->active
    ])
@endsection
@section('javascript')

@endsection