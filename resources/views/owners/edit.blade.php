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
                        <form method="post" action="{{ route('owners.update', $owner->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">{{__("Name")}}</label>
                                <input type="text" class="form-control" name="name" value="{{ $owner->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Surname")}}</label>
                                <input type="text" class="form-control" name="surname" value="{{ $owner->surname }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{__("Phone number")}}</label>
                                <input type="text" class="form-control" name="phone" value="{{ $owner->phone }}">
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
