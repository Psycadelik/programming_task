@extends('default')

 

@section('content')

	<div class="row">

		<section class="content">
			
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
					<div class="pull-left"><h3>List Crops</h3></div>
						<div class="pull-right">
							<div class="btn-group">
								
								<a href="{{ route('crop.create') }}" class="btn btn-info" >Add New</a>
								
							</div>
						</div>
						<div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                       <th><input type="checkbox" id="checkall" /></th>
                       <th>Crop Name</th>
                       <th>Crop Altitude</th>
                       <th>Farming Method</th>
                       <th>Harvest Time</th>
                       <th>View</th>
                       <th>Edit</th>
                       <th>Delete</th>
                   </thead>
    <tbody>
  @if($crops->count())  
  @foreach($crops as $crop)  
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td>{{$crop->crop_name}}</td>
    <td>{{$crop->crop_altitude}}</td>
    <td>{{$crop->farming_method}}</td>
    <td>{{$crop->harvest_time}}</td>
    
    <td><a class="btn btn-primary btn-xs" href="{{action('CropsController@show', $crop->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
    <td><a class="btn btn-primary btn-xs" href="{{action('CropsController@edit', $crop->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
    <td>
<form action="{{action('CropsController@destroy', $crop->id)}}" method="post">
     {{csrf_field()}}
     <input name="_method" type="hidden" value="DELETE">
   
     <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
    </td>
    </tr>
   @endforeach 
   @else
 <tr>
    <td colspan="7">No Records found !!</td>
    </tr>
   @endif
 
   
    
   
    
    </tbody>
        
</table>
						</div>
					</div>

				</div>
			</div>
		</section>

@endsection