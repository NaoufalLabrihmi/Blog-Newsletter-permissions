@extends('dashboard.layouts.layout')

@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{ __('words.dashboard') }}</li>
    <li class="breadcrumb-item"><a href="#">{{ __('words.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('words.dashboard') }}</li>
</ol>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="flex justify-center pt-10 mt-6">
                <button class="bg-purple-300 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="pdf()">Exporter en PDF</button>
            </div>
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('Subscribers') }}
            </div>
            <div id="statc">
                <div class="card-block">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Subscriber data will be filled dynamically here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- delete --}}
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('dashboard.subscribers.delete') }}" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <p>{{ __('words.sure delete') }}</p>
                        @csrf
                        <input type="hidden" name="id" id="id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{ __('words.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('words.delete') }} </button>
                    <a href="{{ url('/subscribers/sendemail') }}" class="btn btn-primary">Send Email to Subscribers</a>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- delete --}}

@endsection

@push('javascripts')
<script type="text/javascript">
    $(function() {
        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dashboard.subscribers.all') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    url: '/subscribers/sendemail',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return '<button class="edit-btn btn btn-primary btn-sm" data-id="' + full.id + '">Edit</button>' +
                            '<button class="delete-btn btn btn-danger btn-sm" data-id="' + full.id + '">Delete</button>' +
                            '<a href="subscribers/sendemail/' + full.id + '" class="btn btn-success btn-sm" data-id="' + full.id + '">Send Email</button>';
                    }
                }
            ]
        });

        $('#table_id tbody').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            deleteSubscriber(id);
        });

        function deleteSubscriber(id) {
            $.ajax({
                url: "{{ route('dashboard.subscribers.delete') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.success); // Show success message
                    table.ajax.reload(); // Reload the DataTable
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors to the console
                }
            });
        }
    });
</script>
<script>
    function pdf() {
        const element = document.getElementById('statc');
        html2pdf(element);
    }
</script>
@endpush