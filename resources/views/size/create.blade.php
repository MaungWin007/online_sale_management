@extends('Admin_Panel.master')

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
                <div class="card-header">{{ __('Size') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{$update==true?url('sizeprocess',[$size->id]):url('/sizeprocess')}}">
                        @csrf
                        @if ($update==true)
                            @method('PATCH')
                        @endif
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="sizename" value="{{ $update==true?$size->sizename:""}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $update==true?$size->description:""}}" required autocomplete="name" autofocus id="description" cols="30" rows="5" type="text"></textarea>
                               

                                @error('description')
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