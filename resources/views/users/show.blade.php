@extends('layouts')

@section('contents')
    @if(empty($user_data))
        No Data
    @else
        <p style="text-align:center">{{ $user_data->name }}</p>
        <p style="text-align:center">{{ $user_data->dob }}</p>
        <p style="text-align:center">{{ $user_data->email }}</p>
    @endif
@endsection