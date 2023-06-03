@extends('layouts.backend.master')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>@lang('Create Slides')</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('slider.index') }}">Dashboard</a></li>
                        <li class="active">Create Slide</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <livewire:slides-fields />
    
@endsection
