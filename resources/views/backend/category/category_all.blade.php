@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
			
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Categories</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Categories</li>
                                
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							 <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
							{{-- <button type="button" class="btn btn-primary">Add Brand</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span> --}}
							</button>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SL</th>
										<th>Category Name</th>
										<th>Category Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($categories as $key => $item)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $item->category_name }}</td>
										<td>
											<img src="{{(asset($item->category_image)) }}" style="width: 70px;
                                            height:40px;" >
											
                                        </td>
										<td>
											<a href="{{ route('edit.category', $item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
										<a href="{{ route('category.subcategories', $item->id) }}" class="btn btn-info">Show Subcategories</a>
										</td>
										
									</tr>
									@endforeach
						
								</tbody>
								<tfoot>
									<tr>
                                        <th>SL</th>
										<th>Category Name</th>
										<th>Category Image</th>
										<th>Action</th>
										
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>

				
			</div>

@endsection