<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    <!-- delete modal -->

                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                </div>
                                    <div class="modal-body">Select "Delete" below if you are ready to delete the user {{$user->name}}.</div>
                                    <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    @if(auth()->user()->userHasRole('Admin'))
                                        <form method="POST" action="{{route('user.destroy',$user->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                    </div>

                                </div>
                                </div>
                            </div>
