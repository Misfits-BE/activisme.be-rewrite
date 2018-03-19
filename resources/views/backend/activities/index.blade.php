@extends('layouts.backend')

@section('page-title', 'Activiteiten log')

@section('title')
	<h1>Activiteiten log <small>Overzicht</small></h1>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-fw fa-dashboard"></i> Home</a></li>
		<li class="active">Activeiten log</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box">
		        <div class="box-header with-border">
		            <h3 class="box-title">@yield('page-title')</h3>

		        </div>
		        <div class="box-body">
		            @include('flash::message') {{-- Flash session view partial --}}

		            <div class="table-responsive">
		                <table class="table table-hover table-striped table-condensed">
		                    <thead>
		                        <tr>
		                            <th>Gebruiker</th>
		                            <th>Log bericht</th>
		                            <th>Gebeurd op:</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @if (count($activities) > 0) {{-- Categories are found --}}
		                            @foreach ($activities as $activity) {{-- Loop through the categories --}}
		                               <tr>
		                               		<td>{{ $activity->causer->name}}</td>
		                               		<td>{{ $activity->description }}</td>
		                               		<td>{{ $activity->created_at->format('d/m/Y') }}</td>
		                               </tr>
		                            @endforeach {{-- /// END categories --}}
		                        @else {{-- No categories found --}}
		                            <tr>
		                                <td colspan="3">
		                                    <span class="text-muted">(Er zijn geen logs van activiteiten gevonden in de applicatie)</span>
		                                </td>
		                            </tr>
		                        @endif
		                    </tbody>
		                </table>
		            </div>

		            {{ $activities->render('vendor.pagination.simple-default') }} {{-- Pagination view instance --}}
		        </div>
		    </div>
		</div>
	</div>
@endsection