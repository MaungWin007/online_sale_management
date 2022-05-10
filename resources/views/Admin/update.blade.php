@extends('layouts.app')

@section('content')
<?php
    $update=false;
    if(isset($user))
    {
        $update=true;
    }

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{$update==true?url('admin/'.$user->id.'/edit'):url('admin/'.$user->id.'/update')}}">
                        @csrf
                        @if ($update==true)
                            @method('GET')
                        @endif
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" {{$update==true?$user->name:""}}value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled required autocomplete="email">

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
                                <input id="name" type="text" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno" {{$update==true?$user->phoneno:""}} value="{{$user->phoneno }}" required autocomplete="phone" autofocus>
        
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
                                <input id="images" type="text" class="form-control" name="images" {{$update==true?$user->images:""}} value="{{$user->images }}" autofocus>
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="branch_id" class="col-md-4 col-form-label text-md-end">{{ __('Branch') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="branch_id" value="{{$user->branchname}}" disabled id="branch_id" autofocus>
                                {{-- <select class="form-select @error('branch_id') is-invalid @enderror" aria-label="Default select example" name="branch_id" required autocomplete="branch_id" autofocus>
                                    <option selected disabled hidden>Select Branch</option>
                                    @foreach ($branch as $branchlist)
                                    <option value="{{$branchlist->id}}">{{$branchlist->name}}</option>
                                    @endforeach
                                </select> --}}
                                {{-- <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$updateStatus==true?$township_record->name:""}}" required autocomplete="name" autofocus> --}}
                                {{-- @error('branch_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="role_id" value="{{$user->rolename}}" disabled id="role_id" autofocus>
                                {{-- <select class="form-select @error('role_id') is-invalid @enderror" aria-label="Default select example" name="role_id" required autocomplete="role_id" autofocus>
                                    <option selected disabled hidden>Select Role</option>
                                    @foreach ($role as $rolelist)
                                    <option value="{{$rolelist->id}}">{{$rolelist->name}}</option>
                                    @endforeach
                                </select> --}}
                                {{-- <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$updateStatus==true?$township_record->name:""}}" required autocomplete="name" autofocus> --}}
                                {{-- @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
        

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
        
                            <div class="col-md-6">
                                @if ($update == true )
                                    <input type="text" class="form-control" name="status" disabled value="{{$user->status==1?"Active":"Inactive"}}" autofocus>                            
                                @else
                                    <select class="form-select" aria-label="Default select example" name="status" {{$update==true?$user->status:""}} required autocomplete="role_id" autofocus>
                                        <option {{$user->status==1?$user->status:""}} value="1">Active</option>
                                        <option {{$user->status==0?$user->status:""}} value="0">Inactive</option>
                                    </select>
                                @endif
                                {{-- <select class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status" {{$flag=='detail'?"disabled":""}} required autocomplete="role_id" autofocus>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select> --}}
        
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{$update==true?"Edit":"Update"}}
                                </button>
        
                                @if ($update == true)
                                    <a href="{{url('/admin')}}" class="btn btn-outline-secondary">Back</a>
                                @else
                                    <a href="{{url('admin/'.$user->id.'/detail')}}" class="btn btn-outline-secondary">Cancel</a>
                                @endif
        
                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
