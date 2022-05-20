@extends('layouts.app')

@section('content')

<?php 
    $update=false;
    if(isset($category))
    {
        $update=true;
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{$update==true?url('categoryprocess',[$category->id]):url('/categoryprocess')}}">
                        @csrf
                        @if ($update==true)
                            @method('PATCH')
                        @endif
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="categoryname" value="{{ $update==true?$category->categoryname:""}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">{{$update==true?"Update":"Save"}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection