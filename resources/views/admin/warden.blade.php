@extends('admin.layout')

@section('title')
    warden
@endsection

@section('content')

<!-- ======= Warden ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Warden Management
            </h2>
            <a href="{{ url('add-warden') }}" class="btn btn-primary float-end">
                <i class="fa-solid fa-plus"></i>
                <span>Add New</span>
            </a>
        </div>
        <hr>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="clearfix m-3">
            <span class="float-end">Search: <input type="search" id="live_search"></span>
        </div>
        <div class="container mt-2">
            <table class="table table-striped table-bordered table-hover" id="searchresult">
                <thead class="table-dark align-center">
                    <tr>
                        <th>Serial Number</th>
                        <th>Student Name</th>
                        <th>Mobile Number</th>
                        <th>Gmail Id</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-center">
                    @php
                        $i = 0
                    @endphp
                    @forelse ($wardens as $warden)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$warden->name}}</td>
                            <td>{{$warden->number}}</td>
                            <td>{{$warden->email}}</td>
                            <td>{{$warden->city}}</td>
                            <td>
                                <a href="{{ route('edit-warden', $warden->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('warden-delete', $warden->email) }}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                No Record Found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ======= End Warden ======= -->

</div>

<script type="text/javascript">

    $(document).ready(function () {

        $("#live_search").keyup(function () {
            search_table($(this).val());
        });

        function search_table(value) {
            $('#searchresult tbody tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
                if (found == 'true') {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            });
        }
    });

</script>

@endsection