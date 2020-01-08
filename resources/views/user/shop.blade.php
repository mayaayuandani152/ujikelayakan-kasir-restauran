@extends('layouts.user_layout.user_design')

@section('link2')

<link rel="stylesheet" href="{{ asset('/css/style.css')}}" />
@endsection

@section('script2')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
<script src="{{ asset('/js/ajax.js')}}"></script>

@endsection

@section('nav2')
<div class="row mt-5 p-1 no-gutters bg-light ">
        <div class="breadcrumbs">
            <div class="container pt-3">
                <a href="{{ route ('shop.index') }}">Shop</a>
                <i class="fa fa-chevron-right creadcrumb-separator"></i>
            </div>
        </div>
    </div>
@section('content')

<div class="col-md-12">
    
    
    <h4 class="text-center font-weight-bold m-4">DAFTAR MAKANAN</h4>
    <div class="row mx-auto">
    
  
    </div>

    <div class="row mx-auto">
        @foreach($masakan as $masakan)
        <div class="card ml-2 mr-2 " style="width: 16rem;">
            <img src="{{ url('/data_file/'.$masakan->foto) }}" class="card-img-top" alt="...">
            <div class="card-body bg-light">
                <h5 class="card-title">{{$masakan->nama_masakan}}</h5>
                <p class="card-text">{{$masakan->status_masakan}}</p> 

                <form action="{{ action('UserController@masakan_store',['id'=>$masakan->id]) }}" method="get">
                <div class="form-group">
                                    <label for="exampleInputEmail1">keterangan</label>
                                    <input name="keterangan" type="number" class="form-control" id="keterangan" aria-describedby="emailHelp" placeholder="keterangan hp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">no_meja</label>
                                    <input name="no_meja" type="text" class="form-control" id="no_meja" aria-describedby="emailHelp" placeholder="keterano_mejangan hp">
                                </div>
                                <div class="form-group">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                                
                </form>

            </div>
            
            
        </div>
        @endforeach

        

        

        
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
@endsection