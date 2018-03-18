@extends('layouts.backend')

@section('page-title', 'Home')

@section('title')
<h1>Page Header
        <small>Optional description</small>
      </h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
@endsection