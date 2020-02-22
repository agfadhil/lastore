@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body fad-panel-body">
                    <p><strong>@lang('quickadmin.qa_dashboard_text')</strong></p>
                    <img class="fad-das-img" src="{{ asset('images/logo_umb.png') }}" />
                </div>
            </div>
        </div>
    </div>
@endsection
