@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{__("Add new owner")}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('owners.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{__("Name")}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                                @error('name') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Surname")}}</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{old('surname')}}">
                                @error('surname') {{$message}} @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{__("Phone number")}}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">
                                @error('phone') {{$message}} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Email")}}</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Adress")}}</label>
                                <input class="form-control" name="address" value="{{old('address')}}">
                            </div>
                            <button class="btn btn-success">{{__("Add")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
