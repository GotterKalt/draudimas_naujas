@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add new shortcode
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('shortcode.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Wanted word</label>
                                <input type="text" class="form-control" name="shortcode">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Replace with</label>
                                <input type="text" class="form-control" name="replace">
                            </div>
                            <button class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
