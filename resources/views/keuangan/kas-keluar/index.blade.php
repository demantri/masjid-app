@extends('layout.app')

@section('title-menu')
    Arus Kas Keuangan
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Kas Keluar</h4>
                </div>
                <form id="form-add">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          There are some problems with your input.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div> 
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">ID Transaksi</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" readonly value="{{$kode}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="{{ date('Y-m-d') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Jenis Transaksi</label>
                                <div class="col-sm-9">
                                    <select name="jenis_transaksi" id="jenis_transaksi" value="{{ old('jenis_transaksi') }}" class="form-control">
                                        <option value="">-</option>
                                        @foreach ($kas as $item)
                                        <option value="{{ $item->kode_kas }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nominal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nominal" value="{{ old('nominal') }}" name="nominal" placeholder="Masukan Nominal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nama Jamaah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_jamaah" value="{{ old('nama_jamaah') }}" name="nama_jamaah" placeholder="Masukan Nama Jamaah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="deskripsi" value="{{ old('deskripsi') }}" name="deskripsi" placeholder="Masukan Deskripsi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function resetForm() {
            $('#form-add')[0].reset();
            $('label.error').remove();
            $('.form-control.is-invalid').removeClass('is-invalid');
        }

        function simpan() {
            let params = {
                id_transaksi: $("#id_transaksi").val(),
                tgl_transaksi: $("#tgl_transaksi").val(),
                nama_jamaah: $("#nama_jamaah").val(),
                nominal: $("#nominal").val(),
                jenis_transaksi: $("#jenis_transaksi").val(),
                deskripsi: $("#deskripsi").val(),
            }

            $.ajax({
                url: '{{ url('keuangan/kas-keluar/store') }}',
                type: "post",
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                beforeSend: function() {
                    @include('processing');
                },
                data: params,
                success: function(response) {
                    swal({
                        title: "",
                        text: response.message,
                        type: "success"
                    }).then(function() {
                        swal.close();
                        resetForm();
                        location.reload();
                    });
                },
                error: function(err) {
                    @include('swal-error');
                    console.log(err)
                }
            })
        }

        $(document).ready(function() {
            $.validator.setDefaults({
                debug: false,
                ignore: "",
                highlight: function(element) {
                    $(element).closest('.form-control').addClass('is-invalid');
                    $(element).siblings('.select2-container').find('.select2-selection').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-control').removeClass('is-invalid');
                    $(element).siblings('.select2-container').find('.select2-selection').removeClass('is-invalid');
                },
                errorPlacement: function(error, element) {
                    if (element.hasClass('select-dua') || element.hasClass('select2-without-search')) {
                        error.insertAfter(element.siblings('.select2'));
                    } else {
                        error.insertAfter(element);   
                    }
                }
            });
            
            $("#form-add").validate({
                submitHandler: function() {
                    swal({
                        text: "Apakah anda yakin?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then((value) => {
                        if (value) {
                            simpan();
                        }
                    });
                },
            });
        });
    </script>
@endsection