@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{__("Edit owner")}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('owners.update', $owner->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">{{__("Name")}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $owner->name }}">
                                @error('name') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Surname")}}</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $owner->surname }}">
                                @error('surname') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Phone number")}}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $owner->phone }}">
                                @error('phone') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Email")}}</label>
                                <input type="email" class="form-control" name="email" value="{{ $owner->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Adress")}}</label>
                                <textarea class="form-control" name="address">{{ $owner->address }}</textarea>
                            </div>
                            <button class="btn btn-success">{{__("Save")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
