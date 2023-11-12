<script src="<?= base_url('js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataPindah').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [2, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-pindah-kelas',
                            "type" : 'POST',
                            },
                    "columns": [
                            {   data: 'id_naik_kelas',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'nama',
                                name : 'nama',
                            },              
                            {
                                data : 'kelas',
                                name : 'kelas',
                                className : "dt-center",
                            },
                            {
                                data : 'tahun_pelajaran',
                                name : 'tahun_pelajaran',
                                className : "dt-center",
                            },                
                            {
                                data : 'status_naik',
                                name : 'status_naik',
                                className : "dt-center",
                            },                
                            {
                                data : 'keterangan_naik',
                                name : 'keterangan_naik',
                                className : "dt-center",
                            },                
                            {   
                                data : 'id_kelas', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-pindah-kelas" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-pindah-kelas" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
    $('#TambahPindah').on('click', function(){
        // $.ajax({
        //     headers: {'X-Requested-With': 'XMLHttpRequest'},
        //     url : 'create_siswa',
        //     type : 'post',
        //     dataType : 'json',
        //     success : function(respon){
                
                $('#PindahModalAdd').modal('show');
        //     },
        //     error : function(){
        //         alert('Terjadi Kesalahan !');
        //     }
        // })
    })
    $('#SiswaFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#SiswaFormAdd').serialize();

        $.ajax({
            url : 'save_siswa',
            type : 'post',
            data : data,
            dataType : 'json',
            beforeSend : function(){

            },
            success : function(respon){
                swal.fire({
                    icon : respon.status,
                    text : respon.msg
                })
                $('#SiswaModalAdd').modal('hide');
                $('#SiswaFormAdd')[0].reset();
            },
            error : function(){
                alert('Terjadi kelasalahan !')
            }
        })
    })
    $(document).on('click','.delete-pindah-kelas',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-pindah-kelas',
                    type : 'post',
                    data : {id:id},
                    dataType : 'json',
                    success : function(respon){
                        swal.fire({
                            icon : respon.status,
                            text : respon.msg
                        })
                        table.ajax.reload();
                    }
                })
            }
        })

       
    })
})
$(document).on('click','.edit-pindah-kelas',function(e){
    e.preventDefault();
    // var id = $(this).attr('data-id');
    // $.ajax({
    //     url : 'edit_siswa',
    //     type : 'post',
    //     data : {id:id},
    //     dataType : 'json',
    //     beforeSend :function(){

    //     },
    //     success :function(respon){
           
            $('#PindahModalEdit').modal('show');
    //     },
    //     error:function(){
    //         alert('Terjadi Kesalahan !');
    //     }
    // })
    
})
$('#btn_update').on('click',function(e){
    e.preventDefault()
    var data = $('#SiswaFormUpdate').serialize();
    $.ajax({
        url : 'update_siswa',
        type : 'post',
        data : data,
        dataType :'json',
        beforeSend : function(){

        },
        success : function(respon){
            swal.fire({
                icon : respon.status,
                text : respon.msg
            })
            if (respon.status == 'success'){
                $('#SiswaModalEdit').modal('hide');
            }
        },
        error : function(){
            alert('Terjadi Kesalahan !');
        }
    })
})
</script>