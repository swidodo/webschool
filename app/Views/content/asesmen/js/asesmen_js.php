<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataAsesmen').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-asesmen',
                            "type" : 'POST',
                            },
                            "columns": [
                            {   data: 'id_jadwal',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'nama_guru',
                                name : 'nama_guru',
                            },              
                            {
                                data : 'nama_pelajaran',
                                name : 'nama_pelajaran',
                            },              
                            {
                                data : 'kelas',
                                name : 'kelas',
                            },              
                            {   
                                data : null, 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return `<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-info me-1 btn-sm input-sumatif-harian fs-6" id_guru="`+data.id_guru+`" id_kelas="`+data.id_kelas+`" id_mapel ="`+data.id_pelajaran+`"><i class="fa-solid fa-pen-to-square me-1"></i> Sumatif Harian</a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm input-sumatif-akhirsemester me-1 fs-6" id_guru="`+data.id_guru+`" id_kelas="`+data.id_kelas+`" id_mapel ="`+data.id_pelajaran+`"><i class="fa-solid fa-pen-to-square me-1"></i> Sumatif Akhir Semester</a>
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm print-rapor fs-6" id_guru="`+data.id_guru+`" id_kelas="`+data.id_kelas+`" id_mapel ="`+data.id_pelajaran+`"><i class="fa-solid fa-print me-1"></i> Raport</a>`;
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
    $(document).on('click','.input-sumatif-harian',function(e){
        e.preventDefault();
        var id_guru = $(this).attr('id_guru')
        var id_kelas = $(this).attr('id_kelas')
        var id_mapel = $(this).attr('id_mapel')
        window.location.href = 'input-sumatif-harian?type=harian&idg='+id_guru+'&idk='+id_kelas+'&idm='+id_mapel;
    })
    $(document).on('click','.input-sumatif-akhirsemester',function(e){
        e.preventDefault();
        var id_guru = $(this).attr('id_guru')
        var id_kelas = $(this).attr('id_kelas')
        var id_mapel = $(this).attr('id_mapel')
        window.location.href = 'input-sumatif-akhir-semester?type=akhir&idg='+id_guru+'&idk='+id_kelas+'&idm='+id_mapel;
    })
    $(document).on('click','.print-rapor',function(e){
        e.preventDefault();
        var id_guru = $(this).attr('id_guru')
        var id_kelas = $(this).attr('id_kelas')
        var id_mapel = $(this).attr('id_mapel')
        window.location.href = 'input-sumatif-akhir-semester?type=rapor&idg='+id_guru+'&idk='+id_kelas+'&idm='+id_mapel;
    })
    $('#inputSumatif').DataTable({
        "paging" : false,
    });
    
})

</script>