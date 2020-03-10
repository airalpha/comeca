@extends('layouts.template')


@section('content')
    <shop-detail :product_slug="'{{ $slug }}'"></shop-detail>
@endsection
