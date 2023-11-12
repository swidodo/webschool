<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
        var table = $('#TblDataNilaiEkskul').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-nilai-ekskul',
                            "type" : 'POST',
                            },
                    "columns": [
                            {   data: 'id',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'nis',
                                name : 'nis',
                            },              
                            {
                                data : 'nama',
                                name : 'nama',
                            },              
                            {
                                data : 'kelas',
                                name : 'kelas',
                            },              
                            {
                                data : 'nama_ekskul',
                                name : 'nama_ekskul',
                            },              
                            {
                                data : 'predikat',
                                name : 'predikat',
                            },              
                            {
                                data : 'deskripsi_ekskul',
                                name : 'deskripsi_ekskul',
                            },              
                            {
                                data : 'semester',
                                name : 'semester',
                            },              
                            {
                                data : 'tahun_pelajaran',
                                name : 'tahun_pelajaran',
                            },              
                            {   
                                data : 'id', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-ekskul" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-ekskul" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
        $('#TambahEkskul').on('click', function(){
            $('#EkskulModalAdd').modal('show');
        })
        $('#EkskulFormAdd').on('submit', function(e){
            e.preventDefault()
            var data = $('#EkskulFormAdd').serialize();

            $.ajax({
                url : 'save-ekskul',
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
                    if (respon.status == "success"){
                        $('#EkskulModalAdd').modal('hide');
                        $('#EkskulFormAdd')[0].reset();
                        table.ajax.reload();
                    }
                    
                },
                error : function(){
                    alert('Terjadi kelasalahan !')
                }
            })
        })
        $(document).on('click','.edit-ekskul',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit-ekskul',
                type : 'post',
                data : {id:id},
                dataType : 'json',
                beforeSend :function(){

                },
                success :function(respon){
                  $('#id_ekskul').val(respon.id_ekskul)
                  $('#nama_ekskul').val(respon.nama_ekskul)
                  $('#EkskulModalEdit').modal('show');
                },
                error:function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $('#EkskulFormEdit').on('submit',function(e){
            e.preventDefault()
            var data = $('#EkskulFormEdit').serialize();
            $.ajax({
                url : 'update-ekskul',
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
                        $('#EkskulModalEdit').modal('hide');
                        $('#EkskulFormEdit')[0].reset();
                        table.ajax.reload();
                    }
                    
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $(document).on('click','.delete-ekskul',function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin Menghapus Data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url : 'delete-ekskul',
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