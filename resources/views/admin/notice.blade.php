@extends('admin.layout')

@section('title')
    admin-notice
@endsection

@section('content')

<!-- ======= Notice ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Notice Management
            </h2>
            <a href="{{ url('issue-notice') }}" class="btn btn-primary float-end">
                <i class="fa-solid fa-plus"></i>
                <span>Issue Notice</span>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-center">
                    @php
                        $i = 0
                    @endphp
                    @forelse ($notices as $notice)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$notice->title}}</td>
                            <td>{{$notice->description}}</td>
                            <td>{{$notice->created_at->format('d/m/Y')}}</td>
                            <td>
                                @if (Auth::user()->email == $notice->email || Auth::user()->role == 'admin')
                                    <a href="{{ route('edit-notice', $notice->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('notice-delete', $notice->id) }}" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Record Not Found!</td>
                        </tr>    
                    @endforelse 
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ======= End Notice ======= -->

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $("#live_search").keyup(function(){
            search_table($(this).val());    
        });

        function search_table(value){
            $('#searchresult tbody tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                        found = 'true';
                    }
                });
                if(found == 'true'){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
        }
    });

</script>

@endsection