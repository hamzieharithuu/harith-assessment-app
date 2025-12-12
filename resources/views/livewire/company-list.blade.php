<div class="col">
    <div class="card">
        <div class="card-header">
            <h4>Companies</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary mb-3" href="{{ route('company.create') }}"><i class='bx bxs-plus-circle'></i>
                        Add New Company</a>
                    {{-- <button wire:click="showCreateForm" >
                        Add Company
                    </button> --}}
                </div>
            </div>
            <div class="dataTables_wrapper">
                <div class="row">
                    <div class="col">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">NO.</th>
                                    <th width="35%">NAME</th>
                                    <th width="20%">EMAIL</th>
                                    <th width="30%">WEBSITE</th>
                                    <th width="10%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $comp)
                                    <tr>
                                        <td style="text-align:center">{{$loop->iteration}}</td>
                                        <td><img src="{{ asset('storage/' . $comp->logo) }}" alt="Company Logo"
                                                width="50" height="50" class="rounded"> {{ $comp->name }}</td>
                                        <td>{{ $comp->email }}</td>
                                        <td><a target="_blank" href="{{ $comp->website_link }}">{{ $comp->website_link }}</a></td>
                                        <td>
                                            <a href="{{ route('company.edit', ['id' => $comp->id]) }}" title="Edit"><button
                                                    class="btn btn-sm btn-dark"><i
                                                        class='bx bxs-edit'></i></button></a>
                                            <button class="btn btn-sm btn-danger" wire:click.prevent="confirmDelete({{ $comp->id }})" title="Delete"><i
                                                    class='bx bxs-trash-alt'></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<script>
    function initializeDataTable() {
        if ($.fn.DataTable.isDataTable('#myTable')) {
            $('#myTable').DataTable().destroy();
        }
        $('#myTable').DataTable({});
    }
    document.addEventListener('refreshDatatable', () => {
        initializeDataTable();
    });
    document.addEventListener('DOMContentLoaded', () => {
        initializeDataTable();
    });
    document.addEventListener('confirm-delete', (e) => {
        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('delete')
            }
        });

    });
</script>
