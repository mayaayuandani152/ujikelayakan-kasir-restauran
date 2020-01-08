
<div class="modal-body">
<form action="/masakan/{{$admin->id}}/update" method="post"enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Admin</label>
                                    <input   name="name" type="text" value="{{$admin->name}}" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nama name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input   name="email" type="text"  value="{{$admin->email}}"  class="form-control" id="detail" aria-describedby="emailHelp" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input   name="password" type="text"  value="{{$admin->password}}"  class="form-control" id="price" aria-describedby="emailHelp" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <select name="id_level" id="id_level" class="custom-select">
                                        <option selected>ID Level</option>
                                        @foreach($level as $level)
                                        <option value="{{$level->id}}">{{$level->nama_level}}</option>
                                        @endforeach
                                    </select>
                                </div> 
        
            </div>
        </div>

                
                
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Beli</button>
    </div>
    </div>
</form>
