@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.logs.title')</h3>
    @can('log_create')
    <p>
        <!--<a href="{{ route('admin.logs.index') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>-->
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($logs) > 0 ? 'datatable' : '' }} @can('log_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('log_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>@lang('quickadmin.logs.fields.id')</th>
                        <th>@lang('quickadmin.logs.fields.user')</th>
                        <th>@lang('quickadmin.logs.fields.role')</th>
                        <th>@lang('quickadmin.logs.fields.file')</th>
                        <th>@lang('quickadmin.logs.fields.folder')</th>
                        <th>@lang('quickadmin.logs.fields.action')</th>

                    </tr>
                </thead>
                
                <tbody>
                
                @foreach ($files as $file)
                    @foreach($file->getMedia('filename') as $m)
                        @php
                        $media[] = $m->file_name
                        @endphp
                    @endforeach
                @endforeach
                    @if (count($logs) > 0)
                        @foreach ($logs as $i => $log)
                        
                        
                            <tr data-entry-id="{{ $log->id }}">
                                <td field-key='id'>{{ $log->id }}</td>
                                <td field-key='user'>{{ $log->user->name }}</td>
                                <td field-key='role'>{{ $log->role->title }}</td>
                                
                                <td field-key='file'>{{ $media[$i] }}</td>
                                <td field-key='folder'>{{ $log->folder->name }}</td>
                                <td field-key='action'>{{ $log->action }}</td>
                                    
                                    <!--<a href="{{ route('admin.logs.index',[$log->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    
                                    <a href="{{ route('admin.logs.index',[$log->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.logs.destroy', $log->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                -->

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
