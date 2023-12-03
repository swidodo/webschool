<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
    var table = $('#TblDataKelas').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-kelas',
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
                                data : 'fase',
                                name : 'fase',
                                className : "dt-center",
                            },
                            {   
                                data : 'id_kelas', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm fs-6 edit-kelas" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm fs-6 delete-kelas" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
    $('#TambahKelas').on('click', function(){
        $('#KelasModalAdd').modal('show');
    })
    $('#KelasFormAdd').on('submit', function(e){
        e.preventDefault()
        var data = $('#KelasFormAdd').serialize();
        $.ajax({
            url : 'save_kelas',
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
                if (respon.status == 'success'){
                    $('#KelasModalAdd').modal('hide');
                    $('#KelasFormAdd')[0].reset();
                    table.ajax.reload();
                }
            },
            error : function(){
                alert('Terjadi kelasalahan !')
            }
        })
    })
    
    $(document).on('click','.edit-kelas',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url : 'edit_kelas',
            type : 'post',
            data : {id:id},
            dataType : 'json',
            beforeSend :function(){

            },
            success :function(respon){
                $('#id_kelas').val(respon.id_kelas);
                $('#kelas').val(respon.kelas);
                $('#minat').val(respon.minat)
                $('#tingkat').val(respon.tingkat)
                $('#seni').val(respon.seni)
                $('#lintas').val(respon.lintas)
                $('#fase').val(respon.fase)
                $('#KelasModalEdit').modal('show');
            },
            error:function(){
                alert('Terjadi Kesalahan !');
            }
        })
        
    })
    $('#KelasFormEdit').on('submit',function(e){
        e.preventDefault()
        var data = $('#KelasFormEdit').serialize();
        $.ajax({
            url : 'update_kelas',
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
                    table.ajax.reload();
                    $('#KelasModalEdit').modal('hide');
                }
            },
            error : function(){
                alert('Terjadi Kesalahan !');
            }
        })
    })
    $(document).on('click','.delete-kelas',function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus data kelas !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : 'delete-kelas',
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

</script>