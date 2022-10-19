<x-admin-master>
    @section('content')
        @if(Session::has('user-deleted'))
        <div class="alert alert-danger">{{Session::get('user-deleted')}}</div>
    @elseif (session('user-created'))
    <div class="alert alert-success">{{Session::get('user-created')}}</div>
    @elseif(session('user-updated'))
    <div class="alert alert-success">{{Session::get('user-updated')}}</div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h2 class="m-0 font-weight-bold text-primary">All Users</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Username</th>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>


                @foreach($users as $user)

                <tr>
                  <td>{{$n +=1}} </td>
                  <td>{{$user->username}} </td>
                  <td><div class="img-responsive"><img height="50px" width="100px" src="{{$user->avatar}}" alt=""> </div></td>
                  <td><a href="{{route('user.profile.show',$user->id)}}">{{$user->name}} </a></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at->diffForHumans()}} </td>
                  <td>{{$user->updated_at->diffForHumans()}} </td>
                  <td>
                    @if(auth()->user()->userHasRole('Admin'))
                    <form method="POST" action="{{route('user.destroy',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                    {{-- <x-admin-delete-modal></x-admin-delete-modal> --}}

                </td>
                </tr>

                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>


      {{-- <div class="d-flex">
          <div class="mx-auto">
                {{$users->links('pagination::bootstrap-4')}}
          </div>
      </div> --}}



    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection
</x-admin-master>
