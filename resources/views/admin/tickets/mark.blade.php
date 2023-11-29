<div class="modal fade" id="mark{{ $ticket->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteLabel">Mark as paid</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your about to mark as paid {{ $ticket->user->name }} ticket? Are you sure you want to proceed?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="{{ route('admin.tickets.mark', $ticket->id) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
