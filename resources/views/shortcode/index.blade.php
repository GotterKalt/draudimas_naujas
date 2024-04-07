@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shortcode - bad word, witch must be replaced/censored</h2>

        <a href="{{ route('shortcode.create') }}" class="btn btn-success">Add new shortcode</a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Shortcode:</th>
                <th>Replace with:</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($shortcodes as $shortcode)
                <tr>
                    <td>{{ $shortcode->id }}</td>
                    <td>{{ $shortcode->shortcode }}</td>
                    <td>{{ $shortcode->replace }}</td>
                    <td>
                        <form action="{{ route('shortcode.destroy', $shortcode->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this owner?')">{{__("Delete")}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
