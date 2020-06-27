@extends('layouts.guest-book')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">{{ ucfirst(config('app.name')) }} Buku Tamu</div>

            <div class="panel-body fad-panel-body">
                {{-- Form --}}
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header with-border">
                          <h3 class="box-title">Isi Buku Tamu</h3>
                      </div>
                      <form role="form" action="{{ route('guest-book.save_feedback') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="inputNama">Nama</label>
                                  <input type="text" class="form-control" id="inputNama" name="inputNama" placeholder="Nama" required="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="inputNIM">NIM</label>
                                  <input type="text" class="form-control" id="inputNIM" name="inputNIM" placeholder="NIM" required="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="inputFakultas">Fakultas</label>
                                  <input type="text" class="form-control" id="inputFakultas" name="inputFakultas" placeholder="Fakultas" required="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="inputPesan">Pesan dan Saran</label>
                                  <textarea class="form-control" rows="3" id="inputPesan" name="inputPesan" placeholder="Pesan dan Saran...."></textarea>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <br><b>NOTE: Selain mahasiswa bisa isi NIM dan Fakultas dengan isian "Umum". Terima Kasih.</b>
                            </div>

                        </form>
                  </div>
                </div>
                {{-- Tabel Responden --}}
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Response Tamu</h3>
                        </div>
                        
                        <div class="box-body no-padding">
                            <table class="table table-striped" id="table-response">
                                <thead>
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Nama</th>
                                      <th>NIM</th>
                                      <th>Fakultas</th>
                                      <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($list_feedback) > 0)
                                @for ($i = 0; $i < count($list_feedback); $i++)
                                    <tr>
                                        <td>@php echo $i+1; @endphp</td>
                                        <td> {{ $list_feedback[$i]->name }} </td>
                                        <td> {{ $list_feedback[$i]->student_id }} </td>
                                        <td> {{ $list_feedback[$i]->department }} </td>
                                        <td> {{ $list_feedback[$i]->message }} </td>
                                    </tr>
                                @endfor
                                @else 
                                <tr><td colspan="5" rowspan="2" headers="">Tidak ada data.</td></tr>   
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-javascripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-response').DataTable();
    } );
</script>
@endsection