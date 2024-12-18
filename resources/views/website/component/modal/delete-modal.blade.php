<i class="fas fa-trash action_danger_btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $id }}" style="cursor: pointer"></i>

<div class="modal fade" id="deleteModal{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg bg-body rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Do you want to delete?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    No
                </button>
                <form action="{{ route($route, $id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Yes,
                        Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
