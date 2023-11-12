<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    $(document).ready(function(){
      
        var table = $('#TblDataGuru').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    "ordering": true,
                    "order": [
                        [1, 'asc']
                    ], 
                    ajax : {
                            "url" : 'data-guru',
                            "type" : 'POST',
                            },
                    "columns": [
                            {   data: 'id_guru',"sortable": false, render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                                className : "dt-center"
                            },
                            {
                                data : 'nama_guru',
                                name : 'nama_guru',
                            },              
                            {
                                data : 'nip',
                                name : 'nip',
                                className : "dt-center",
                            },
                                        
                            {
                                data : 'emailuser',
                                name : 'emailuser',
                                className : "dt-center",
                            },
                            {
                                data : 'userlog',
                                name : 'userlog',
                            },
                            {
                                data : 'group_name',
                                name : 'group_name',
                            },
                            {
                                data : 'status',
                                render : function(data,row,type){
                                    var status ='';
                                    if (data == 'Y'){
                                        status = 'Aktif'
                                    }else{
                                        status = 'Non Aktif'
                                    }
                                    return status;
                                },
                                className : "dt-center",
                            },
                            {   
                                data : 'id_guru', 
                                sortable: false,
                                render :function( data, type, row, meta ) {
                                            return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-guru" data-id="'+data+'"><i class="fa-solid fa-pen-to-square"></i></a><a href="javascript:void(0);" class="btn btn-danger btn-sm delete-guru" data-id="'+data+'"><div class="d-flex justify-content-center"><i class="fa fa-import me-1"></i> <i class="fa fa-trash"></i></div></a></div><a href="javascript:void(0);" class="btn btn-warning btn-sm reset-password me-1 mt-1" data-id="'+data+'"><i class="fa fa-reset"></i>Reset Password</a>';
                                        },
                                className : "dt-center",
                                },           
                        ],
                })
        $('#TambahGuru').on('click', function(){
            $.ajax({
                url : 'get-pelajaran',
                type : 'post',
                dataType : 'json',
                success : function(respon){
                    $('#GuruModalAdd').modal('show');
                    var html ='<option value="">-- Pilih --</option>';
                    $.each(respon.mapel,function(key,val){
                        html += `<option value="`+val.id_pelajaran+`">`+val.nama_pelajaran+`</option>`;
                    })
                    $('#addIdpelajaran').html(html)

                    var group ='<option value="">-- Pilih --</option>';
                    $.each(respon.auth_group,function(key,val){
                        group += `<option value="`+val.id+`">`+val.name+`</option>`;
                    })
                    $('#addAuthGroup').html(group)
                }
            })
        })
        $('#GuruFormAdd').on('submit', function(e){
            e.preventDefault()
            var data = $('#GuruFormAdd').serialize();

            $.ajax({
                url : 'save_guru',
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
                        $('#GuruModalAdd').modal('hide');
                        $('#GuruFormAdd')[0].reset();
                        table.ajax.reload();
                    }
                    
                },
                error : function(){
                    alert('Terjadi kelasalahan !')
                }
            })
        })
        $(document).on('click','.edit-guru',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit_guru',
                type : 'post',
                data : {id:id},
                dataType : 'json',
                beforeSend :function(){

                },
                success :function(respon){
                    $('#id_guru').val(respon.guru.id_guru)
                    $('#nama').val(respon.guru.nama_guru)
                    $('#nip').val(respon.guru.nip)
                    $('#telpon').val(respon.guru.telpon_guru)
                    $('#duk').val(respon.guru.duk)
                    $('#jabatan').val(respon.guru.jabatan)
                    $('#alamat').val(respon.guru.alamat_guru)
                    $('#mulai_kerja').val(respon.guru.mulai_kerja)
                    $('#user_id').val(respon.guru.user_id)
                    $('#email').val((respon.user != null) ?respon.user.email :'')
                    $('#usernameID').val((respon.user != null) ? respon.user.username : '')
                    if(respon.guru.jk =="P"){
                        $('#jk_P').attr('checked',true)
                    }else{
                        $('#jk_L').attr('checked',true)
                    }
                    if(respon.guru.status =="Y"){
                        $('#status').html(`
                        <option value="Y" selected>Aktif</option>
                        <option value="N">Non Aktif</option>`)
                    }else{
                        $('#status').html(`
                        <option value="Y">Aktif</option>
                        <option value="N" selected>Non Aktif</option>`)
                    }
                    if(respon.guru.status_pegawai =="1"){
                        $('#status_pegawai').html(`
                        <option value="1" selected>PNS</option><option value="2">Non PNS</option>`)
                    }else{
                        $('#status_pegawai').html(`
                        <option value="1">PNS</option><option value="2" selected>Non PNS</option>`)
                    }
                    var pel ='';
                    $.each(respon.mapel,function(key,val){
                        if (val.id_pelajaran == respon.guru.id_pelajaran){
                            pel += `<option value="`+val.id_pelajaran+`" selected>`+val.nama_pelajaran+`</option>`;
                        }else{
                            pel += `<option value="`+val.id_pelajaran+`">`+val.nama_pelajaran+`</option>`;
                        }
                    })
                    $('#id_pelajaran').html(pel)

                    var group ='';
                    $.each(respon.auth_group,function(key,val){
                        if(respon.user != null){
                            if (respon.user.group_id == val.id){
                                group += `<option value="`+val.id+`" selected>`+val.name+`</option>`;
                            }else{
                                group += `<option value="`+val.id+`">`+val.name+`</option>`;
                            }
                        }else{
                            group += `<option value="">-- Pilih --</option>`;
                            group += `<option value="`+val.id+`">`+val.name+`</option>`;
                        }
                    })
                    $('#hakAkses').html(group)

                    $('#GuruModalEdit').modal('show');
                },
                error:function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $('#GuruFormEdit').on('submit',function(e){
            e.preventDefault()
            var data = $('#GuruFormEdit').serialize();
            $.ajax({
                url : 'update_guru',
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
                        $('#GuruModalEdit').modal('hide');
                        $('#GuruFormEdit')[0].reset();
                        table.ajax.reload();
                    }
                    
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
        $(document).on('click','.delete-guru',function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus Data Secara Permanent !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url : 'delete-guru',
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
        $(document).on('click','.reset-password',function(e){
            var id = $(this).attr('data-id')
            $.ajax({
                url : 'get-userid',
                type : 'post',
                data :{id : id },
                dataType : 'json',
                success : function(respon){
                    $('#userId').val(respon.user_id)
                },
                error : function ()
                {
                    alert('Terjadi Kesalahan !');
                }
            })
            $('#resetPassword').modal('show');
        })
        $('#pass_confirm').on('keyup',function(){
            var conf = $('#pass_confirm').val()
            var pass = $('#pass_new').val()
            if (conf != pass){
                $('#error').html('confirm password no metch !')
                $('#btnsend').attr('disabled',true)
            }else{
                $('#error').html('')
                $('#btnsend').attr('disabled',false)
            }
        })
        $('#pass_new').on('keyup',function(){
        var conf = $('#pass_confirm').val()
        var pass = $('#pass_new').val()
            if (conf != ''){
                if (pass != conf){
                    $('#error').html('confirm password no metch !')
                    $('#btnsend').attr('disabled',true)
                }else{
                    $('#error').html('')
                    $('#btnsend').attr('disabled',false)
                }
            }
        })
        $('#ubahPassword').on('submit',function(e){
            e.preventDefault();
            var data = $('#ubahPassword').serialize();
            $.ajax({
                url : 'ubah-password',
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
                        $('#resetPassword').modal('hide');
                        $('#ubahPassword')[0].reset();
                    }
                },
                error : function(){
                    alert('Terjadi Kesalahan !');
                }
            })
        })
    })


</script>