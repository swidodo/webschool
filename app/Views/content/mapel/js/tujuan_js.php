<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
        var id_cp = $('#id_cp').val();
        var id_pel = $('#id_pelajaran').val();
        loadData(id_cp,id_pel)
        function loadData(id_cp,id_pel){
            $('#TblDataTujuan').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-tujuan-mapel',
                            "type" : 'POST',
                            "data" :{id_cp : id_cp, id_pel,id_pel },
                            },
                    "columns": [
                            {   data: 'id_tp',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'tp_ke',
                                name : 'tp_ke',
                            },              
                            {
                                data : 'kode_tp',
                                name : 'kode_tp',
                            },              
                            {
                                data : 'tujuan_pembelajaran',
                                name : 'tujuan_pembelajaran'
                            },              
                            
                            {
                                data : 'materi',
                                name : 'materi'
                            },              
                            
                            {   
                                data : 'id_tp', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<a href="javascript:void(0);" class="btn btn-primary me-1 btn-sm edit-tujuan" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger delete-tujuan" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
            }
        $('#TambahTujuan').on('click', function(){
            var idpel = $('#id_pelajaran').val();
            var idcp = $('#id_cp').val();
            $('#idpel').val(idpel);
            $('#idcp').val(idcp);
            $('#TujuanModalAdd').modal('show');
        })
        $('#TujuanFormAdd').on('submit',function(e){
            e.preventDefault();
            var idpel = $('#id_pelajaran').val();
            var idcp = $('#id_cp').val();
            var data = $('#TujuanFormAdd').serialize();
            $.ajax({
                url : 'save_tujuan',
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
                        $('#TujuanFormAdd')[0].reset();
                        loadData(idcp,idpel)
                        $('#TujuanModalAdd').modal('hide');
                    }
                },
                error : function(){

                }
            })
        })
       
        $(document).on('click','.edit-tujuan',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit-tujuan',
                type : 'post',
                data : {id_tp:id},
                dataType : 'json',
                beforeSend :function(){

                },
                success :function(respon){
                    $('#idtp').val(respon.id_tp)
                    if (respon.tp_ke == "TP 1"){
                        var tp1 ='selected';
                    }else{
                        var tp1 ='';
                    }
                    if (respon.tp_ke == "TP 2"){
                        var tp2 ='selected';
                    }else{
                        var tp2 ='';
                    }
                    if (respon.tp_ke == "TP 3"){
                        var tp3 ='selected';
                    }else{
                        var tp3 ='';
                    }
                    if (respon.tp_ke == "TP 4"){
                        var tp4 ='selected';
                    }else{
                        var tp4 ='';
                    }
                    if (respon.tp_ke == "TP 5"){
                        var tp5 ='selected';
                    }else{
                        var tp5 ='';
                    }
                    if (respon.tp_ke == "TP 6"){
                        var tp6 ='selected';
                    }else{
                        var tp6 ='';
                    }
                    if (respon.tp_ke == "TP 7"){
                        var tp7 ='selected';
                    }else{
                        var tp7 ='';
                    }
                    if (respon.tp_ke == "TP 8"){
                        var tp8 ='selected';
                    }else{
                        var tp8 ='';
                    }
                    if (respon.tp_ke == "TP 9"){
                        var tp9 ='selected';
                    }else{
                        var tp9 ='';
                    }
                    if (respon.tp_ke == "TP 10"){
                        var tp10 ='selected';
                    }else{
                        var tp10 ='';
                    }
                    $('#tp_ke').html(`
                        <option value="TP 1" `+tp1+`>TP 1</option>
                        <option value="TP 2" `+tp2+`>TP 2</option>
                        <option value="TP 3" `+tp3+`>TP 3</option>
                        <option value="TP 4" `+tp4+`>TP 4</option>
                        <option value="TP 5" `+tp5+`>TP 5</option>
                        <option value="TP 6" `+tp6+`>TP 6</option>
                        <option value="TP 7" `+tp7+`>TP 7</option>
                        <option value="TP 8" `+tp8+`>TP 8</option>
                        <option value="TP 9" `+tp9+`>TP 9</option>
                        <option value="TP 10" `+tp10+`>TP 10</option>
                    `)
                    $('#kode_tp').val(respon.kode_tp)
                    $('#tujuanTP').val(respon.tujuan_pembelajaran)
                    $('#materi').val(respon.materi)
                    $('#TujuanModalEdit').modal('show');
                },
                error:function(){
                    alert('Terjadi Kesalahan !');
                }
            })
            
        })
        $('#TujuanFormEdit').on('submit',function(e){
            e.preventDefault()
            var idpel = $('#id_pelajaran').val();
            var idcp = $('#id_cp').val();
            var data = $('#TujuanFormEdit').serialize();
            $.ajax({
                url : 'update_tujuan',
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
                        $('#TujuanModalEdit').modal('hide');
                        loadData(idcp,idpel)
                    }
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $(document).on('click','.delete-tujuan',function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Ingin Menghapus Data Tujuan Pembelajaran !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id');
                    var idpel = $('#id_pelajaran').val();
                    var idcp = $('#id_cp').val();
                    $.ajax({
                        url : 'delete_tujuan',
                        type : 'post',
                        data : {id:id},
                        dataType : 'json',
                        success : function(respon){
                            swal.fire({
                                icon : respon.status,
                                text : respon.msg
                            })
                            if (respon.status == 'success'){
                                loadData(idcp,idpel)
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