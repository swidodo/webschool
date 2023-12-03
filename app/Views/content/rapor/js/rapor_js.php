<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataRapor').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'get-data-rapor',
                            "type" : 'POST',
                            },
                            "columns": [
                            {   data: 'id_kelas',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'kelas',
                                name : 'kelas',
                            },   
                                   
                            {   
                                data :null, 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return `<a href="javascript:void(0);" class="btn btn-success me-1 btn-sm mt-1 fs-6 cover" kelasid="`+data.id_kelas+`" tahun="`+data.tahun_pelajaran+`" smt="`+data.semester+`"><i class="fa-solid fa-print me-1"></i> Cover</a>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm mt-1 fs-6 identitas" kelasid="`+data.id_kelas+`" tahun="`+data.tahun_pelajaran+`" smt="`+data.semester+`"><i class="fa fa-print me-1"></i> Identitas sekolah</a>
                                            <a href="javascript:void(0);" class="btn btn-success btn-sm mt-1 fs-6 siswa" kelasid="`+data.id_kelas+`" tahun="`+data.tahun_pelajaran+`" smt="`+data.semester+`"><i class="fa fa-print me-1"></i> Data Siswa</a>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm mt-1 fs-6 mid-semester" data-id="'+data+'"><i class="fa fa-print me-1"></i> Mid Semester</a>
                                            <a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 fs-6 semester-hal1" data-id="'+data+'"><i class="fa fa-print me-1"></i> Semester Hal 1</a>
                                            <a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 fs-6 semester-hal2" data-id="'+data+'"><i class="fa fa-print me-1"></i> Semester Hal 2</a>
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm mt-1 fs-6 raporp5" data-id="'+data+'"><i class="fa fa-print me-1"></i> Rapor P5</a>
                                            <a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 fs-6 ledger" data-id="'+data+'"><i class="fa fa-print me-1"></i> Ledger</a>`;
                                        },
                                className : "dt-right",
                                },           
                        ],
                })
    $(document).on('click','.cover', function(e){
        e.preventDefault()
        var kelas = $(this).attr('kelasid');
        var tahun = $(this).attr('tahun');
        var smt = $(this).attr('smt');
        var url ='<?= base_url();?>'+`cover?type=cover&kelas=`+kelas+`&tahun=`+tahun+`&smt=`+smt;
        window.open(url,'_blank'); 
    })
    $(document).on('click','.identitas', function(e){
        e.preventDefault()
        var kelas = $(this).attr('kelasid');
        var tahun = $(this).attr('tahun');
        var smt = $(this).attr('smt');
        var url ='<?= base_url();?>'+`identitas?type=identitas&kelas=`+kelas+`&tahun=`+tahun+`&smt=`+smt;
        window.open(url,'_blank'); 
    })
    $(document).on('click','.siswa', function(e){
        e.preventDefault()
        var kelas = $(this).attr('kelasid');
        var tahun = $(this).attr('tahun');
        var smt = $(this).attr('smt');
        var url ='<?= base_url();?>'+`identitas?type=siswa&kelas=`+kelas+`&tahun=`+tahun+`&smt=`+smt;
        window.open(url,'_blank'); 
    })
})

</script>