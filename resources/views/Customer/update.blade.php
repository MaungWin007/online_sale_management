

@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{url('customer/'.$user->id.'/update')}}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{$user->name}}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" disabled value="{{$user->email}}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phoneno" class="col-md-4 col-form-label text-md-end">{{ __('Phone No') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"  value="{{$user->phoneno}}" required autocomplete="phone" autofocus>

                        @error('phoneno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="images" type="text" class="form-control" name="images"  value="{{$user->images}}" autofocus>
                    </div>
                </div>                

                <div class="row mb-3">
                    <label for="branch_id" class="col-md-4 col-form-label text-md-end">{{ __('Branch') }}</label>
                    <div class="col-md-6">
                        <input id="images" type="text" class="form-control" name="branch_id" disabled value="{{$user->branchname}}">
                        {{-- <select class="form-select @error('branch_id') is-invalid @enderror" aria-label="Default select example" name="branch_id" {{$flag=='detail'?"disabled":""}} required autocomplete="branch_id" autofocus>
                            <option selected disabled hidden>Select Branch</option>
                            @foreach ($branch as $branchitem)
                            <option value="{{$branchitem->id}}">{{$branchitem->name}}</option>  
                            @endforeach
                        </select> --}}
                    {{-- {{$flag=='detail'?$user->branch_id==$branchitem->branch_id?"selected":"":""}}  --}}
                    </div>
                </div>

               

                <div class="row mb-3">
                    <label for="totalamount" class="col-md-4 col-form-label text-md-end">{{ __('Total Amount') }}</label>

                    <div class="col-md-6">
                        <input id="totalamount" type="text" class="form-control" name="totalamount"  value="{{$user->totalamount}}" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="point" class="col-md-4 col-form-label text-md-end">{{ __('Point') }}</label>

                    <div class="col-md-6">
                        <input id="point" type="text" class="form-control" name="point"  value="{{$user->point}}" autofocus>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Update
                        </button>

                        @if ($flag == "detail")
                            <a href="{{url('customer/list')}}" class="btn btn-outline-secondary">Back</a>
                        @else
                            <a href="{{url('customer/'.$user->id.'/detail')}}" class="btn btn-outline-secondary">Cancel</a>
                        @endif

                        
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection
   
