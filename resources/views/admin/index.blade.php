@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				Admin Panel
			</div>

			<div class="panel-body">
				
				<div class="col-md-6 col-md-offset-3">

					<form method="GET" action="/admin/user">
						<h2>Search User by ID</h2>
						<div id="custom-search-input">
							<div class="input-group col-md-12">
								<input type="text" class="form-control input-lg" placeholder="User ID" name="user"/>
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>

							</div>
						</div>

					</form>




					<hr>
					<form method="GET" action="/admin/bid">
						<h2>Search Bid by ID</h2>
						<div id="custom-search-input">
							<div class="input-group col-md-12">
							<input type="text" class="form-control input-lg" placeholder="Bid ID" name="bid"/>
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>

							</div>
						</div>
					</form>


					<hr>

					<form method="GET" action="/admin/contract">
						<h2>Search Contract by ID</h2>
						<div id="custom-search-input">
							<div class="input-group col-md-12">
								<input type="text" class="form-control input-lg" placeholder="Contract ID" name="contract"/>
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>

							</div>
						</div>
					</form>
					<hr>
					@include('layouts.errors')
				</div>

				
			</div>


		</div>
	</div>
</div>

@endsection