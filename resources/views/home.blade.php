@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body fad-panel-body">
                    <p><strong>Hello and welcome, {{{Auth::user()->name}}}</strong></p>
                    <!-- <p><strong>@lang('quickadmin.qa_dashboard_text')</strong></p> -->
                    <div>
                      <img class="fad-das-img" src="{{ asset('images/logo_umb.png') }}" />
                      <p>Berikut ketentuan yang wajib dipahami pengguna :</p>
                      <ul>
                        <li>Aplikasi LaStore dijalankan berdasarkan kesepakatan dan regulasi perusahaan yang berlaku</li>
                        <li>Diwajibkan untuk tidak memberitahu hak kredensial pengguna pada siapapun termasuk kepada pihak admin.</li>
                        <li>Segala tindak pelanggaran akan dikenakan hukuman sesuai dengan kebijakan yang berlaku.</li>
                      </u;>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
