
<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert.all.js');?>"></script>
<script>
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
                   
                    { "data": "nama_sekolah" }, 
                    { "data": "alamat" }, 
                    { "data": "status" }, 
                    { "data": "logo" }, 
                    { "data": "foto" }, 
                    { "data": "is_active" }, 
                    { "data": "id", 
                    "render": 
                        function( data, type, row, meta ) {
                            return '<a href="javascript:void(0);" class="btn btn-success me-1 btn-sm edit-sekolah" data-id="'+data+'">edit</a><a href="javascript:void(0);" class="btn btn-primary btn-sm view-sekolah" data-id="'+data+'">view</a>';
                        }
                    },
                ],
                "columnDefs":[
                    {clssName : "dt-center",targets:[0]}
                ],
        })
        $('#TambahSekolah').on('click',function(e){
            e.preventDefault();
            $('#tambahSekolahModal').modal('show');
        })
        $('#formtambahsekolah').on('submit',function(e){
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
                    $('#tambahSekolahModal').modal('hide');
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
                    $('#edit_nama_sekolah').val(res.nama_sekolah)
                    $('#edit_alamat').val(res.alamat)
                    $('#editSekolahModal').modal('show');
                },
                error : function(){
                    alert('Terjadi kesalahan !');
                }
            })
        })
    })
</script>