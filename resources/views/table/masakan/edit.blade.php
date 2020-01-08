
<div class="modal-body">
<form action="/masakan/{{$masakan->id}}/update" method="post"enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <img src="{{ url('/data_file/'.$masakan->foto) }}" alt="" width=300px>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Masakan</label>
                                    <input   name="nama_masakan" type="text" value="{{$masakan->nama_masakan}}" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nama masakan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input   name="harga" type="text"  value="{{$masakan->harga}}"  class="form-control" id="detail" aria-describedby="emailHelp" placeholder="harga">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status Masakan</label>
                                    <input   name="status_masakan" type="text"  value="{{$masakan->status_masakan}}"  class="form-control" id="price" aria-describedby="emailHelp" placeholder="status_masakan">
                                </div>
                                <div class="form-group">
                                    <b>File Gambar</b><br/>
                                    <input type="file" name="foto" class="form-control">
                                </div>
        
            </div>
        </div>

                
                
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Beli</button>
    </div>
    </div>
</form>
