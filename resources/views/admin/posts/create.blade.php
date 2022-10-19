<x-admin-master>

    @section('content')
    <h1>Create</h1>
    <div class="row">
        <div class="col-md-6">
            <form method ="POST" action="{{route('post.store')}}" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
                </div>

                <div class="form-group">
                    <label for="file">Image</label>
                    <input type="file" name="post_image" class="form-control-file" id="post_image">
                </div>
                <div class="form-group">
                    <label for="body">Context</label>
                    <textarea name="body" class="form-control" id="body" cols="10" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>


            </form>
        </div>
    </div>


    @endsection



</x-admin-master>
