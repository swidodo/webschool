<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
        var id = $('#id_pelajaran').val();
        loadData(id)
        function loadData(id_pelajaran){
            $('#TblDataCapaian').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-capaian-mapel',
                            "type" : 'POST',
                            "data" :{id : id_pelajaran },
                            },
                    "columns": [
                            {   data: 'id_cp',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'elemen',
                                name : 'elemen',
                            },              
                            {
                                data : 'capaian_pembelajaran',
                                name : 'capaian_pembelajaran',
                            },              
                            {
                                data : 'id_cp',
                                render :function( data, type, row, meta ) {
                                            return '-';
                                        },
                                className : "dt-center",
                            },              
                            
                            {
                                data : 'id_cp',
                                render :function( data, type, row, meta ) {
                                            return '-';
                                        },
                                className : "dt-center",
                            },              
                            
                            {   
                                data : 'id_cp', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-info me-1 btn-sm tujuan-mapel" data-id="'+data+'"><i class="fa-solid fa-search"></i>Tujuan pembelajaran</a><div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-primary me-1 btn-sm edit-capaian" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-capaian" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
            }
        $('#TambahCapaian').on('click', function(){
            var idpel = $('#id_pelajaran').val();
            $('#idpel').val(idpel);
            $('#CapaianModalAdd').modal('show');
        })
        $('#CapaianFormAdd').on('submit',function(e){
            e.preventDefault();
            var id = $('#id_pelajaran').val();
            var data = $('#CapaianFormAdd').serialize();
            $.ajax({
                url : 'save_capaian',
                type : 'post',
                data : data,
                dataType : 'json',
                beforeSend : function(){

                },
                success : function(respon){
                    swal.fire({
                        icon : respon.status,
                        text : respon.msg,
                    })
                    if(respon.status == "success"){
                        $('#CapaianFormAdd')[0].reset();
                        loadData(id)
                        $('#CapaianModalAdd').modal('hide');
                    }
                },
                error : function(){

                }
            })
        })
       
        $(document).on('click','.edit-capaian',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit-capaian',
                type : 'post',
                data : {id:id},
                dataType : 'json',
                beforeSend :function(){

                },
                success :function(respon){
                    $('#id').val(respon.id_cp)
                    $('#elemen').val(respon.elemen)
                    $('#capaian').val(respon.capaian_pembelajaran)
                    $('#CapaianModalEdit').modal('show');
                },
                error:function(){
                    alert('Terjadi Kesalahan !');
                }
            })
            
        })
        $('#CapaianFormEdit').on('submit',function(e){
            e.preventDefault()
            var id = $('#id_pelajaran').val();
            var data = $('#CapaianFormEdit').serialize();
            $.ajax({
                url : 'update_capaian',
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
                        $('#CapaianFormEdit')[0].reset()
                        $('#CapaianModalEdit').modal('hide');
                        loadData(id)
                    }
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $(document).on('click','.delete-capaian',function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin Menghapus Data Pelajaran !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id');
                    var ids = $('#id_pelajaran').val();
                    $.ajax({
                        url : 'delete_capaian',
                        type : 'post',
                        data : {id:id},
                        dataType : 'json',
                        success : function(respon){
                            swal.fire({
                                icon : respon.status,
                                text : respon.msg
                            })
                            if (respon.status == 'success'){
                                loadData(ids)
                            }
                        }
                    })
                }
            })

        
        })
        $(document).on('click','.tujuan-mapel',function(){
            var id = $(this).attr('data-id');
            var idpel = $(this).attr('data-id');
            window.location.href ='<?= base_url();?>tujuan-mapel?id='+id+'&idpel='+idpel;
        })
    })

</script>