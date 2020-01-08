@extends('layouts.admin_layout.admin_design')

@section('script')
    <title>karyawan</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
    <script src="{{ asset('/js/ajax.js')}}"></script>
@endsection

@section('content')
<div class="col-md-10 mt-5">
@if(session('sukses'))
        <div class="alert alert-success">{{session('sukses')}}</div>
    @endif
    <div class="container">
<div class="card mt-4">
<div class="card-body ">
    <div class="row">
        <div class="col-6">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
		    @endif
            <h3><i class="fas fa-users mr-2"></i>DATA ADMIN</h3><hr>
        </div>
        <div class="col-6">	
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square mr-3"></i>TAMBAH DATA ADMIN</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <div class="modal-body">
				            <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
					            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input   name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nama" require="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input   name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" require="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input   name="password" type="text" class="form-control" id="password" aria-describedby="emailHelp" placeholder="password" require="">
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
					    <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
				            </form>
                        </div>
                    </div>
                </div>
        </div>
        <table class="table table-bordered table-striped">
        
			<thead>
				<tr>
                    <th>ID Admin</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Level</th>
					<th >OPSI</th>
				</tr>
			</thead>
			<tbody>
            @if (count($hasil))
            <div class="card-panel green white-text">Hasil pencarian : <b>{{$query}}</b></div>
				@foreach($hasil as $image)
				<tr>
                    <td>{{$image->id}}</td>
                    <td>{{$image->name}}</td>
                    <td>{{$image->email}}</td>
                    <td>{{$image->password}}</td>
                    <td>{{$image->id_level}}</td>
					<td>
                        
                        <a href="{{ action('AdminController@edit',['id'=>$image->id]) }}" title="Detail" class=" modalMd" data-target="#modalMd" data-toggle="modal"><i class=" fas fa-edit btn btn-warning text-white "></i></a>
                        <a  href="/pengguna/{{ $image->id }}/delete" ><i class="fas fa-trash-alt btn btn-danger text-with" data-toggle="tooltip" title="Hapus"></i></a>
                    </td>
				</tr>
				@endforeach
                {{ $hasil->render() }}
                @else
                    <div class="card-panel red darken-3 white-text">Oops.. Data <b>{{$query}}</b> Tidak Ditemukan</div>
                @endif
                
                </tbody>
			</tbody>
        </table>
        </div>
        </div>


        <!-- Modal -->
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="modalMdTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-h idden="true">&times;</span>
        </button>
      </div>
            <div class="modalError"></div>
            <div id="modalMdContent">
                
            </div>

    </div>
  </div>
  </div>

		
  </div>
  </div>
@endsection
@section('cari')
        <form action="{{ url('/pengguna') }}" class="form-inline my-2 my-lg-0 ml-auto" method="GET">
          
            <input type="text" class="form-control mr-sm-2" name="q" placeholder="Cari">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0"><i class="fa fa-search">Cari</i></button>
            </form>
            @endsection