<x-admin-master>

    @section('content')

        <h1>User Profile</h1>
        <div class="row">
            <div class="col-md-6">
                <form method ="POST" action="{{route('user.profile.update',$user->id)}}" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <img class="img-profile rounded-circle" width="100px" height="100px" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar" id="avatar">
                    </div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text"
                            name="username"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            value="{{$user->username}}">

                            @error('username')

                                <div class="invalid-feedback">{{$message}}</div>

                            @enderror

                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            value="{{$user->name}}">
                            @error('name')

                                <div class="invalid-feedback">{{$message}}</div>

                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            value="{{$user->email}}">
                            @error('email')

                                <div class="invalid-feedback">{{$message}}</div>

                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password">
                            @error('password')

                                <div class="invalid-feedback">{{$message}}</div>

                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                            name="password_confirmation"
                            class="form-control"
                            id="password-confirmation">
                            @error('password-confirmation')

                                <div class="alert alert-danger">{{$message}}</div>

                            @enderror
                    </div>




                    <button type="submit" class="btn btn-primary">Submit</button>


                </form>
            </div>
        </div>



    @endsection



</x-admin-master>
