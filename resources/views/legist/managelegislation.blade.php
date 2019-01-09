@extends('layouts.master')

@section('title' , 'goshentax/admin/manage-legislation')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assests/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection   

@section('content')

<!--banner-->	
<div class="banner">
	<h2>
        <a href="{{ route('dashboard') }}">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Manage Legislations</span>
    </h2>	         
</div>
<!--//banner-->

<!--grid-->
 <div class="grid-form">
	<div class="grid-form1">
		  <h4 id="forms-horizontal" class="text-center">Records</h4> <br/>
			<table id="managePostTable" class="table">
				<thead>
					<tr>
                        <th>Id</th>
                        <th>title</th>
                        <th>Approval Status</th>
                        <th>policy document</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
                    @foreach($legislations as $legislation) 
                        <tr id="{{$legislation->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$legislation->title}}</td>
                            <td>
                                @if($legislation->approved == 0)
                                    <span class="label label-danger">pending</span>
                                @else
                                    <span class="label label-success">approved</span>
                                @endif
                            </td>
                            <td>{{$legislation->content}}</td>
                            <td>
                                <!-- drop-down-for-userprofile-->
                                    <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Manage
                                            <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('legislation.edit' , $legislation->id) }}"><i class="fa fa-edit"></i>edit</a></li>
                                                    @if($legislation->approved == 0 && Auth::user()->role != "USER")
                                                        <li><a href="{{ route('legislation.approve' , $legislation->id) }}"><i class="fa fa-globe"></i>approve</a></li>
                                                    @endif
                                                    <li><a href="{{ route('legislation.delete' , $legislation->id) }}"><i class="glyphicon glyphicon-trash"></i>delete</a></li>
                                                </ul>
                                    </div>
					            <!--// drop-down-for-userprofile-->
                            </td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
	</div>
</div>
<!--//grid-->

<!---delete-post-modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Post</h4>
        </div>
        <div class="modal-body content">
          <h4 class="text-center" id="notificationId"> </h4>  
          <p class="text-center notification">Do you really want to delete <span id="title"> <span></p>
            <form method="post" action="" id="deleteForm">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="1" id="rowId">
                <div class="text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="removePostBtn"> <i class="glyphicon glyphicon-ok-sign delete"></i> delete </button>
                </div> 
            </form>
         </div>
        <div class="modal-footer delteModalFooter">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assests/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('DataTables/datatables.js') }}"> </script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('notification'))
    toastr.warning("{{ Session::get('notification') }}");
    @endif
</script>       
@endsection