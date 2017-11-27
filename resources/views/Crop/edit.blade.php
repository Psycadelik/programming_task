@extends('default')

@section('content')

	<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">
				  @if (count($errors) > 0)

			        <div class="alert alert-danger">

			            <strong>Whoops!</strong> There were some problems with your input.<br><br>

			            <ul>

			                @foreach ($errors->all() as $error)

			                    <li>{{ $error }}</li>

			                @endforeach

			            </ul>

			        </div>

			    @endif
			    @if(Session::has('success'))
				    <div class="alert alert-info">
				      {{Session::get('success')}}
				    </div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title">Update Crop : {{$crop->crop_name}}</h3>
				 	</div>

					<div class="panel-body">
			
					
						<div class="table-container">
    						<form method="POST" action="{{ route('crop.update', $crop->id) }}"  role="form">
    						{{ csrf_field() }}
    						<input name="_method" type="hidden" value="PATCH">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="crop_name" value="{{$crop->crop_name}}" id="crop_name" class="form-control input-sm" placeholder="Crop Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="crop_altitude" value="{{$crop->crop_altitude}}" id="crop_altitude" class="form-control input-sm" placeholder="Crop Altitude">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="farming_method" value="{{$crop->farming_method}}" id="crop_altitude" class="form-control input-sm" placeholder="Farming Method">
			    					</div>
			    				</div><div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="harvest_time" value="{{$crop->harvest_time}}" id="harvest_time" class="form-control input-sm" placeholder="Harvest Time">
			    					</div>
			    				</div>
			    			</div>

			    			

			    		
			    			
			    		 <div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-12">
								<input type="submit"  value="Update" class="btn btn-success btn-block">
								<a href="{{ route('crop.index') }}" class="btn btn-info btn-block" >Back</a>
							</div>	
							
					     </div>
			    		</form>
						</div>
					</div>

				</div>
			</div>
		</section>

@endsection