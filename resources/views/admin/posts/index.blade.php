<x-admin-master>

    @section('content')
    @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
    @elseif (session('post-created'))
    <div class="alert alert-success">{{Session::get('post-created')}}</div>
    @elseif(session('post-updated'))
    <div class="alert alert-success">{{Session::get('post-updated')}}</div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h2 class="m-0 font-weight-bold text-primary">All Posts</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>


                @foreach($posts as $post)

                <tr>
                  <td>{{$n +=1}} </td>
                  <td>{{$post->user->name}} </td>
                  <td><a href="{{route('post.edit',$post->id)}}">{{$post->title}} </a></td>
                  <td><div class="img-responsive"><img height="50px" width="100px" src="{{$post->post_image}}" alt=""> </div></td>
                  <td>{{$post->created_at->diffForHumans()}} </td>
                  <td>{{$post->updated_at->diffForHumans()}} </td>
                  <td>
                      @can('viewAny',$post)
                    <form method="POST" action="{{route('post.destroy',$post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger">Delete</button>

                    </form>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="d-flex">
          <div class="mx-auto">
                {{$posts->links('pagination::bootstrap-4')}}
          </div>
      </div>

    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}

    @endsection




</x-admin-master>
