<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
        var table = $('#TblDataMapel').DataTable({
                        processing: true,
                        serverSide: true,
                        destroy: true,
                        "ordering": true,
                        "order": [
                            [1, 'asc']
                        ], 
                        ajax : {
                                "url" : 'data-mapel',
                                "type" : 'POST',
                                },
                        "columns": [
                                {   data: 'id_pelajaran',"sortable": false, render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    },
                                    className : "dt-center"
                                },
                                {
                                    data : 'nama_pelajaran',
                                    name : 'nama_pelajaran',
                                },              
                                
                                {   
                                    data : 'id_pelajaran', 
                                    sortable: false,
                                    render :function( data, type, row, meta ) {
                                                return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-info me-1 btn-sm capaian-mapel" data-id="'+data+'"><i class="fa-solid fa-search"></i>Capaian pembelajaran</a><div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-primary me-1 btn-sm edit-mapel" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-mapel" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                            },
                                    className : "dt-center",
                                    },           
                            ],
                    })
        $('#TambahMapel').on('click', function(){
            $('#MapelModalAdd').modal('show');
        })
        $('#MapelFormAdd').on('submit',function(e){
            e.preventDefault();
            var data = $('#MapelFormAdd').serialize();
            $.ajax({
                url : '',
                type :'post',
                data : data,
                dataType : 'json',
                beforeSend : function(){

                },
                success : function(respon){

                },
                error : function(){

                }
            })
        })
        $('#MapelFormAdd').on('submit', function(e){
            e.preventDefault()
            var data = $('#MapelFormAdd').serialize();

            $.ajax({
                url : 'save_mapel',
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
                    $('#MapelModalAdd').modal('hide');
                    $('#MapelFormAdd')[0].reset();
                    table.ajax.reload();
                },
                error : function(){
                    alert('Terjadi kelasalahan !')
                }
            })
        })
        $(document).on('click','.edit-mapel',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit_mapel',
                type : 'post',
                data : {id:id},
                dataType : 'json',
                beforeSend :function(){

                },
                success :function(respon){
                    $('#id').val(respon.id_pelajaran)
                    $('#pelajaran').val(respon.nama_pelajaran)
                    $('#urutan').val(respon.urutan)
                    $('#MapelModalEdit').modal('show');
                },
                error:function(){
                    alert('Terjadi Kesalahan !');
                }
            })
            
        })
        $('#MapelFormEdit').on('submit',function(e){
            e.preventDefault()
            var data = $('#MapelFormEdit').serialize();
            $.ajax({
                url : 'update_mapel',
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
                        $('#MapelModalEdit').modal('hide');
                        table.ajax.reload();
                    }
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $(document).on('click','.delete-mapel',function(e){
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
                    $.ajax({
                        url : 'delete_mapel',
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
        $(document).on('click','.capaian-mapel',function(){
            var id = $(this).attr('data-id');
            window.location.href ='<?= base_url();?>capaian-mapel/'+id;
        })
    })

</script>