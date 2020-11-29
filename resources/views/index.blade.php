@extends('layouts/client')

@section('content')
<index :latestProducts="{{ $latestProducts }}" :saleProducts="{{ $saleProducts }}" :randomProducts="{{ $randomProducts }}" :featuredProducts="{{ $featuredProducts }}"></index>
@endsection
