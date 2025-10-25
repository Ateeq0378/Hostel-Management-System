@extends('student.layout')

@section('title')
    admin-room
@endsection

@section('content')

<!-- ======= Notice ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Notice Management
            </h2>
        </div>
        <hr>
        <div class="clearfix">
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Record Not Found!</td>
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