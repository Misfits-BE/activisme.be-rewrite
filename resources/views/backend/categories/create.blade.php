@extends('layouts.backend')

@section('page-title', 'Categorie toevoegen')

@section('title')
    <h1>Categorie toevoegen <small>Beheerspaneel</small></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-fw fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.categories.index') }}">Categorieen</a></li>
        <li class="active">Toevoegen</li>
    </ol>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('page-title')</h3>
        </div>
        <div class="box-body">
            @include('flash::message') {{-- Flash session view partial --}}

            <form method="POST" action="{{ route('admin.categories.store') }}" class="form-horizontal">
                @csrf {{-- Form field protection --}}

                <div class="form-group @error('name', 'has-error')">
                    <label for="name" class="control-label col-md-2">Naam van de categorie: <span class="text-danger">*</span></label>

                    <div class="col-md-5">
                        <input type="text" id="name" class="form-control" placeholder="Naam van de categorie" @input('name', old('name'))>
                        @error('name')
                    </div>
                </div>

                <div class="form-group @error('description', 'has-error')">
                    <label for="description" class="control-label col-md-2">Beschrijving van de categorie: <span class="text-danger">*</span></label>

                    <div class="col-md-10">
                        <textarea rows="5" @input('description') class="form-control" placeholder="Korte beschrijving van de categorie">{{ old('description') }}</textarea>
                    
                        @if ($errors->has('description')) {{-- Validation errors found --}}
                            @error('description') {{-- Validation error partial --}}
                        @else {{-- No validation errors found --}}
                            <span class="help-block">
                                <span class="text-danger">*</span> Hou de beschrijving zo kort mogelijk.
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-fw fa-check"></i> Opslaan
                        </button>

                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-fw fa-undo"></i> Annuleren
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
