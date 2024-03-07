@extends('createrlayout.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Profile</h4>
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
        <form class="forms-sample" method="post" action="route('createrupdateProfile',$user->id)}}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" value="{{ old('title', $user->name) }}" class="form-control" id="name"
                        name="name" placeholder="Name">
                    @if ($errors->has('name'))
                    <span class="text-danger">
                        {{ $errors->first('name') }}
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" value="{{ old('email', $user->email) }}" class="form-control" id="email"
                        name="email" placeholder="Email" readonly>
                    @if ($errors->has('email'))
                    <span class="text-danger">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
            </div>
            
           <!-- ... rest of the form ... -->
            <button type="submit" id="saveProfile" class="btn btn-primary mr-2">Submit</button>
        </form>
    </div>
</div>

@endsection
@section('script')



@endsection
