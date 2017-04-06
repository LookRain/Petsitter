@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User Profile</div>
                <div class="panel-body">
                {{-- {{  $user->isAdmin  }} --}}
                    <form class="form-horizontal" role="form" method="POST" action="/admin/user/update">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{  $user->name  }}" disabled>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{  $user->id  }}">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" value="{{  $user->email  }}" disabled>                          
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender: </label>
                            <div class="col-md-6">
                                <select class="form-control" id="gender" disabled>
                                    <option>{{  $user->gender  }}</option>
                                   
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{  $user->address  }}" disabled>                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="age" class="col-md-4 control-label">Age: </label>
                            <div class="col-md-6">
                            <input type="number" id="age" class="form-control" value="{{  $user->age  }}" name="age" min="0" max="200" step="1" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_admin" class="col-md-4 control-label" name="is_admin">Is Admin? </label>
                            <div class="col-md-6">
								@if($user->isAdmin)
                                <select class="form-control" name="is_admin" >
                                    <option value=0 >No</option>
                                    <option value=1 selected="selected">Yes</option>
                                </select>
								@else
								<select class="form-control" name="is_admin" >
                                    <option value=0 selected="selected">No</option>
                                    <option value=1>Yes</option>
                                </select>

                                @endif

                            </div>
                        </div>

                        
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="/admin/user/delete">
						{{  csrf_field()  }}     
						<input type="hidden" name="id" value="{{  $user->id  }}">               
                    	<button type="submit" class="btn btn-danger">
                                    Delete
                                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
