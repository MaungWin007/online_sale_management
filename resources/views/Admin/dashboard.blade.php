
@extends('Admin_Panel.master')
@section('content')


    <h1>Dashboard</h1>
    Welcome Back {{Auth()->user()->name}}
    
@endsection