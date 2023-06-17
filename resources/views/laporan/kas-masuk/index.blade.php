@extends('layout.app')

@section('title-menu')
    Arus Kas Keuangan
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Kas Masuk</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-target="#modal-add" data-toggle="modal">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center">ID Transaksi</th>
                                <th class="text-center">Tanggal Transaksi</th>
                                <th class="text-center">Nama Jamaah</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah COA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-add">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">No. COA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control numeric" id="no_coa" name="no_coa" placeholder="Masukan No. COA">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Nama COA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_coa" name="nama_coa" placeholder="Masukan Nama COA">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Posisi</label>
                            <div class="col-sm-9">
                                <select name="posisi" id="posisi" class="form-control">
                                    <option value="">Pilih Posisi</option>
                                    <option value="d">Debit</option>
                                    <option value="k">Kredit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Saldo Awal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control numeric" id="saldo_awal" name="saldo_awal" placeholder="Masukan Saldo Awal" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit COA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">No. COA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control numeric" id="no_coa_edit" name="no_coa" placeholder="Masukan No. COA">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Nama COA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_coa_edit" name="nama_coa" placeholder="Masukan Nama COA">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Posisi</label>
                            <div class="col-sm-9">
                                <select name="posisi" id="posisi_edit" class="form-control">
                                    <option value="">Pilih Posisi</option>
                                    <option value="d">Debit</option>
                                    <option value="k">Kredit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Saldo Awal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control numeric" id="saldo_awal_edit" name="saldo_awal" placeholder="Masukan Saldo Awal" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                no_coa: $("#no_coa").val(),
                nama_coa: $("#nama_coa").val(),
                posisi: $("#posisi").val(),
                saldo_awal: $("#saldo_awal").val(),
            }
            $.ajax({
                url: '{{ url('masterdata/coa/store') }}',
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
            $('#table').DataTable({
                order: [
                    [1, 'asc']
                ],
                aoColumnDefs: [
                    { 
                        bSortable: false, 
                        aTargets: [0]
                    }, 
                ]
            });

            $(".modal").on("hidden.bs.modal", function() {
                resetForm();
            });

            $(".btn-edit").on("click", function() {
                let no_coa = $(this).data("no_coa");
                let nama_coa = $(this).data("nama_coa");
                let posisi = $(this).data("posisi");
                let saldo_awal = $(this).data("saldo_awal");

                $("#no_coa_edit").val(no_coa);
                $("#nama_coa_edit").val(nama_coa);
                $("#posisi_edit").val(posisi);
                $("#saldo_awal_edit").val(saldo_awal);
            })

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
                rules: {
                    no_coa: {
                        required: true,
                    },
                    nama_coa: {
                        required: true,
                    },
                    posisi: {
                        required: true,
                    },
                    saldo_awal: {
                        required: true,
                    },
                }
            });
        });
    </script>
@endsection