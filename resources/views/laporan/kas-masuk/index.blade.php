@extends('layout.app')

@section('title-menu')
    Arus Kas Keuangan
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Kas Masuk</h4>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center">
                                <input type="text" name="date_from" id="date_from" class="form-control" autocomplete="off">
                                <div class="m-r-10 m-l-10">s/d</div>
                                <input type="text" name="date_to" id="date_to" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kas Masuk</label>
                        <div class="col-sm-4">
                            <select name="kas_masuk" id="kas_masuk" class="form-control">
                                @foreach ($kas as $item)
                                <option value="{{ $item->kode_kas }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-4">
                            <button class="btn btn-primary" type="button" id="btn-filter"> Filter</button>
                        </div>
                    </div>

                    <div class="d-none" id="content">
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

                    if (data.length == 0) {
                        swal('', 'Data tidak ditemukan!', 'info');
                    }

                    if (data.length > 0) {
                        swal.close();
                        $("#content").removeClass('d-none');
                        let no = 1;
                        for (let i = 0; i < data.length; i++) {
                            row = `
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
            let todaydt = new Date();

            $("#date_from").datepicker({
                dateFormat: "dd/mm/yy",
                changeMonth: true,
                changeYear: true,
                endDate: todaydt,
                onSelect: function (date) {
                    var date2 = $('#date_from').datepicker('getDate');
                    $('#date_to').datepicker('option', 'minDate', date2);
                }, 
            }).datepicker("setDate", todaydt)

            $('#date_to').datepicker({
                dateFormat: "dd/mm/yy",  
                changeMonth: true,
                changeYear: true,
            }).datepicker("setDate", todaydt);

            $("#btn-filter").on("click", function() {
                getList();
            });
        });
    </script>
@endsection