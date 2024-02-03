<!DOCTYPE html>
<html lang="en">
	@include('admin.includes.head')

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			@include('admin.includes.header')
			@include('admin.includes.sidebar')

			@include('admin.includes.topnavigation')


			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Cars</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Car</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form action="{{route('updateCar',$car->id) }}" method="post" enctype="multipart/form-data"
										
									id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
									@csrf
										@method('put')
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" name="carTitle" value="{{ $car->carTitle }}" required="required" class="form-control ">
												@error('carTitle')
                                              <div class="alert alert-warning">
                                               {{ $message }}
                                                   @enderror
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea name="shortdescription"   id="shortdescription" required="required" class="form-control">{{ $car->shortdescription}}</textarea>
												@error('shortdescription')
                                            <div class="alert alert-warning">
                                              {{ $message }}

                                                   @enderror
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Description: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="description" required="required" class="form-control"   id="description">{{ $car->description}}</textarea>
												@error('description')
												<div class="alert alert-warning">
												{{ $message }}
												@enderror
											</div>
										</div>
										<div class="item form-group">
											<label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="luggage" class="form-control" type="number" name="luggage" value="{{ $car->luggage }}" required="required">
												@error('luggage')
                                              <div class="alert alert-warning">
                                               {{ $message }}
                                                   @enderror
											</div>
										</div>
										<div class="item form-group">
											<label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="doors" class="form-control" type="number" name="doors" value="{{ $car->doors }}" required="required">
												@error('doors')
                                              <div class="alert alert-warning">
                                               {{ $message }}
                                                   @enderror
											</div>
										</div>
										<div class="item form-group">
											<label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="passengers" class="form-control" type="number" name="passenger" value="{{ $car->passenger }}" required="required">
												@error('passenger')
                                              <div class="alert alert-warning">
                                               {{ $message }}
                                                   @enderror
											</div>
										</div>
										<div class="item form-group">
											<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="price" class="form-control" type="number" name="price" value="{{ $car->price }}" required="required">
												@error('price')
                                              <div class="alert alert-warning">
                                               {{ $message }}
                                                   @enderror
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" @checked($car->active)>Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="active" class="flat">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image" required="required" class="form-control">
												<img src="{{ asset ('assets/images/'.$car->image)}}" alt="" style="width: 300px;">
												@error('image')
												<div class="alert alert-warning">
									
													{{ $message }}
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category_id" id="">
													<option value=" ">Select Category</option>
													@foreach ($categories as $category )
                                                   <option value="{{$category->id}}"{{$car->category_id ==$category->id ? 'selected':''}}>
  
                                                     {{$category->categoryName}}</option>
  
                                                    @endforeach
												</select>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success">Update</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			

			@include('admin.includes.footer')
