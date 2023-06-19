@extends('layout.app')

@section('title-menu')
    Arus Kas Keuangan
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Arus Kas</h4>
                </div>
                <div class="card-body">

                    {{-- <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center">
                                <input type="text" name="date_from" id="date_from" class="form-control" autocomplete="off">
                                <div class="m-r-10 m-l-10">s/d</div>
                                <input type="text" name="date_to" id="date_to" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-4">
                            <select name="periode" id="periode" class="form-control">
                                <option value="1">Bulanan</option>
                                <option value="2">Tahunan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="div_bulan">
                        <label for="" class="col-sm-2 col-form-label">Bulan</label>
                        <div class="col-sm-4">
                            <select name="bulan" id="bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-4">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @for ($i = 2020; $i <= 2030; $i++)
                                <option value="">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-4">
                            <button class="btn btn-primary" type="button" id="btn-filter"> Filter</button>
                        </div>
                    </div>

                    <div class="" id="content">
                        <hr>
                        <table class="table table-hover" id="table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center text-nowrap">No</th>
                                    <th class="text-center text-nowrap">ID Transaksi</th>
                                    <th class="text-center text-nowrap">Tanggal Transaksi</th>
                                    <th class="text-center text-nowrap">Nama Jamaah</th>
                                    <th class="text-center text-nowrap">Nominal</th>
                                    <th class="text-center text-nowrap">Nama Kas</th>
                                    <th class="text-center text-nowrap">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getList() {
            let params = {
                date_from: $("#date_from").val(),
                date_to: $("#date_to").val(),
                kas_masuk: $("#kas_masuk").val(),
            }

            $.ajax({
                url: '{{ url('laporan/kas-masuk/filter') }}',
                type: "post",
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                beforeSend: function() {
                    @include('processing');
                },
                data: params,
                success: function(response) {
                    let data = response;
                    let row = '';

                    if ( $.fn.DataTable.isDataTable('#table') ) {
                        $('#table').DataTable().destroy();
                    }

                    if (data.length == 0) {
                        swal('', 'Data tidak ditemukan!', 'info');
                    }

                    if (data.length > 0) {
                        swal.close();
                        $("#content").removeClass('d-none');
                        let no = 1;
                        for (let i = 0; i < data.length; i++) {
                            row += `
                                <tr>
                                    <td>${ no++ }</td>
                                    <td>${ data[i].id_transaksi }</td>
                                    <td>${ data[i].tanggal_transaksi }</td>
                                    <td>${ data[i].nama_jamaah }</td>
                                    <td class="text-right">${ data[i].nominal }</td>
                                    <td>${ data[i].nama }</td>
                                    <td>${ data[i].deskripsi }</td>
                                </tr>
                            `;
                        }
                        $("#tbody").html(row);
                        $('#table').DataTable({
                            scrollX: true,
                            scrollCollapse: true,
                            destroy: true,
                            order: [
                                [0, 'asc']
                            ],
                        });
                    }
                },
                error: function(err) {
                    @include('swal-error');
                    console.log(err)
                }
            });
        }

        $(document).ready(function() {

            $("#periode").on("change", function() {
                let value = $(this).val();

                if (value == 2) {
                    $("#div_bulan").addClass('d-none');
                } else {
                    $("#div_bulan").removeClass('d-none');
                }
            })

            $("#btn-filter").on("click", function() {
                getList();
            });
        });
    </script>
@endsection