
<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
    $(document).ready(function(){
        var table = $('#sekolahTbl').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            "ordering": true,
            "order": [
                [1, 'asc']
            ], 
            ajax : {
                    "url" : 'get_sekolah',
                    "type" : 'POST',
                    },
            "columns": [
                    { data: 'id',"sortable": false, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                   
                    { "data": "tahun_pelajaran" }, 
                    { "data": "semester",
                        render:function(data,row,type){
                            var nm = '';
                            if(data == 1){
                                nm = "Ganjil";
                            }else if(data == 2){
                                nm = "Genap";
                            }
                            return nm;
                        }
                     }, 
                    { "data": "nama_sekolah" }, 
                    { "data": "kepala_sekolah" }, 
                    { "data": "tgl_biodata",
                    }, 
                    { "data": "entri_nilai",
                        render:function(data,row,type){
                            var entri = '';
                            if(data == "Y"){
                                entri = '<span class="badge badge-primary">Active</span>';
                            }else if(data == "N"){
                                entri = '<span class="badge badge-danger">Non Active</span>';
                            }
                            return entri;
                        }
                     }, 
                    
                    { "data": "id", 
                        "sortable": false,
                        "render": 
                        function( data, type, row, meta ) {
                            return '<a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-sekolah d-flex justify-content-centar" data-id="'+data+'"><span class="fa fa-edit"></span>edit</a>';
                        }
                    },
                ],
                "columnDefs":[
                    {clssName : "dt-center",targets:[0]}
                ],
        })
        $('#TambahSekolah').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url : 'get_tahun',
                type : 'post',
                dataType : 'json',
                success : function(respon){
                    var tahun = '<option value="" selected>-- pilih --</option>';
                    $.each(respon , function(key,val){
                        tahun +='<option value="'+val.tahun_pelajaran+'">'+val.tahun_pelajaran+'</option>'
                    })
                    $('#tahun_pelajaran').html(tahun)
                }
            })
            $('#TambahSekolahModal').modal('show');
        })
        $('#formTambahSekolah').on('submit',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url : 'save-sekolah',
                type : 'post',
                data : formData,
                dataType : 'json',
                cache:false,
                contentType: false,
                processData: false,
                beforeSend : function(){

                },
                success : function(res){
                    swal.fire({
                        icon : res.status,
                        text : res.msg
                    })
                    $('#TambahSekolahModal').modal('hide');
                    table.ajax.reload();
                },
                error : function(){
                    alert('Terjadi kesalahan !');
                }
            })
        })
        $(document).on('click','.edit-sekolah', function(){
           var id = $(this).attr('data-id');
            $.ajax({
                url : 'edit-sekolah',
                type : 'post',
                data : {id:id},
                dataType : 'json',
                beforeSend : function(){

                },
                success : function(res){
                    $('#id').val(res.sekolah.id)
                    $('#edit_nama_sekolah').val(res.sekolah.nama_sekolah)
                    $('#edit_alamat').val(res.sekolah.alamat_sekolah)
                    $('#edit_kepala_sekolah').val(res.sekolah.kepala_sekolah)
                    $('#edit_nip_kepsek').val(res.sekolah.nip_kepsek)
                    $('#edit_telpon').val(res.sekolah.telpon)
                    $('#edit_fax').val(res.sekolah.fax)
                    $('#edit_kode_pos').val(res.sekolah.kode_pos)
                    if(res.sekolah.entri_nilai == "Y"){
                        $('#edit_entri_nilai').html(`
                        <option value="Y" selected>Active</option>
                        <option value="N">Non Active</option>`);
                    }else{
                        $('#edit_entri_nilai').html(`
                        <option value="Y">Active</option>
                        <option value="N" selected>Non Active</option>`);
                    }
                    if (res.sekolah.semester == "1"){
                        $('#edit_semester').html(`
                        <option value="1" selected>Ganjil</option>
                        <option value="2">Genap</option>`)
                    }else{
                        $('#edit_semester').html(`
                        <option value="1">Ganjil</option>
                        <option value="2" selected>Genap</option>`)
                    }
                    $('#edit_tgl_biodata').val(res.sekolah.tgl_biodata)
                    var tahun ='';
                    $.each(res.tahun_pelajaran,function(key,val){
                        if(res.sekolah.tahun_pelajaran == val.tahun_pelajaran){
                            tahun += `<option value="`+val.tahun_pelajaran+`" selected>`+val.tahun_pelajaran+`</option>`;
                        }else{
                            tahun += `<option value="`+val.tahun_pelajaran+`">`+val.tahun_pelajaran+`</option>`;
                        }
                    })
                    $('#edit_tahun_pelajaran').html(tahun)
                    $('#editSekolahModal').modal('show');
                },
                error : function(){
                    alert('Terjadi kesalahan !');
                }
            })
        })
        $('#formEditSekolah').on('submit',function(e){
            e.preventDefault()
            // var data = $('#formEditSekolah').serialize();
            var formData = new FormData(this);
            $.ajax({
                url : 'update-sekolah',
                type : 'post',
                data : formData,
                dataType : 'json',
                cache:false,
                contentType: false,
                processData: false,
                beforeSend : function(){

                },
                success : function (respon){
                    swal.fire({
                        icon : respon.status,
                        text : respon.msg
                    })
                    if (respon.status == 'success'){
                        $('#editSekolahModal').modal('hide');
                        table.ajax.reload();
                    }
                },
                error : function(){
                    alert('terjadi kesalahan');
                }
            })
        })
    })
</script>