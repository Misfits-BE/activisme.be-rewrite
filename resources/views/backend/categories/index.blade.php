@extends('layouts.backend')

@section('page-title', 'Categorieen')

@section('title')
    <h1>Categorieen <small>Beheerspaneel</small></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-fw fa-dashboard"></i> Home</a></li>
        <li class="active">Categorieen</li>
    </ol>
@endsection

@section('content')
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
                            <th>#</th>
                            <th>Aangemaakt door</th>
                            <th>Categorie naam</th>
                            <th colspan="2">Categorie beschrijving</th> {{-- Colspan="2" needed for the functions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0) {{-- Categories are found --}}
                            @foreach ($categories as $category) {{-- Loop through the categories --}}
                                <tr>
                                    <td><strong>#C{{ $category->id }}</strong></td>
                                    <td>{{ $category->author->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    
                                    <td> {{-- Options --}}
                                        <span class="text-center">
                                            <a href="{{ route('admin.categories.edit', $category)}}" class="text-muted" data-toggle="tooltip" data-placement="bottom" title="Wijzig">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>

                                            <a href="{{ route('admin.categories.delete', $category) }}" class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Verwijder">
                                                <i class="fa fa-fw fa-close"></i>
                                            </a>
                                        </span>
                                    </td> {{-- /// Options --}}
                                </tr>
                            @endforeach {{-- /// END categories --}}
                        @else {{-- No categories found --}}
                            <tr>
                                <td colspan="6">
                                    <span class="text-muted">(Er zijn geen catgeorieen gevonden in de applicatie)</span>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{ $categories->render('vendor.pagination.simple-default') }} {{-- Pagination view instance --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {$('[data-toggle="tooltip"]').tooltip()})
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endpush