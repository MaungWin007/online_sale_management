@extends('layouts.app')


@section('content')

<?php 
    $update=false;
    if(isset($color))
    {
        $update=true;
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Color') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{$update==true?url('colorprocess',[$color->id]):url('/colorprocess')}}" enctype="multipart/form-data">
                        @csrf
                        @if ($update==true)
                            @method('PATCH')
                        @endif
                        <div class="row mb-3">
                            <label for="colorname" class="col-md-4 col-form-label text-md-end">{{ __('Color Name') }}</label>

                            <div class="col-md-6">
                                <input id="colorname" type="text" class="form-control @error('name') is-invalid @enderror" name="colorname" value="{{ $update==true?$color->colorname:""}}" required autocomplete="name" autofocus>

                                @error('colorname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="colorcode" class="col-md-4 col-form-label text-md-end">{{ __('Color Code') }}</label>

                            <div class="col-md-6">
                                <input id="colorcode" type="text" class="form-control @error('name') is-invalid @enderror" name="colorcode" value="{{ $update==true?$color->colorcode:""}}" required autocomplete="name" autofocus>

                                @error('colorcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="colorimage" class="col-md-4 col-form-label text-md-end">{{ __('Color Image') }}</label>

                            <div class="col-md-6">
                                <input id="colorimage" type="file" class="form-control @error('name') is-invalid @enderror" name="colorimage" value="{{ $update==true?$color->colorimage:""}}" autocomplete="name" autofocus>

                                
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