@extends('admin.layout')

@section('title')
    admin-complain
@endsection

@section('content')

<!-- ======= Complain ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Complain Management
            </h2>
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
                        <th>Enrollment Number</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-center">
                    @php
                        $i = 0;
                    @endphp
                    @forelse ($complains as $complain)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$complain->enroll_number}}</td>
                            <td>{{$complain->title}}</td>
                            <td>{{$complain->description}}</td>
                            <td>{{$complain->complain_date}}</td>
                            <td class="d-flex justify-content-evenly">
                                @if ($complain->status)
                                    <form action="{{ route('resolved-complain',$complain->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-regular fa-flag"></i>
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-success">
                                        <i class="fa-regular fa-circle-check"></i>
                                    </button>
                                @endif
                                <a href="{{ url('show-complain', [$complain->id, $complain->enroll_number]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Record Not Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ======= End Complain ======= -->

<!-- Modal for Complaint View -->
<div class="modal fade" id="resolvedComplain">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Has the complaint been resolved?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body d-flex justify-content-around">
                <form action="" class="col-8" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success col-6">Yes</button>
                </form>
                <a type="button" class="btn btn-danger col-4" data-bs-dismiss="modal">Cancle</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

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