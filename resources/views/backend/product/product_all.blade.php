@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
			
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Products</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('all.product') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Products</li>
                                
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							 <a href="{{ route('add.product') }}" class="btn btn-primary">Add Product</a>
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
										<th>Image</th>
										<th>Product Name</th>
                                        <th>Price</th>
                                        <th>QTY</th>
                                        <th>Discount</th>
                                        <th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($products as $key => $item)
									<tr>
										<td>{{ $key+1 }}</td>
										
										<td>
											<img src="{{(asset($item->product_thumbnail)) }}" style="width: 70px;
                                            height:40px;" >
	
                                        </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>{{ $item->discount_price }}</td>
                                        <td>{{ $item->status }}</td>
										<td>
											<a href="{{ route('edit.category', $item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
										<a href="{{ route('category.subcategories', $item->id) }}" class="btn btn-info">Subcategories</a>
										</td>
										
									</tr>
									@endforeach
						
								</tbody>
								<tfoot>
									<tr>
                                        <th>SL</th>
										<th>Image</th>
										<th>Product Name</th>
                                        <th>Price</th>
                                        <th>QTY</th>
                                        <th>Discount</th>
                                        <th>Status</th>
										<th>Action</th>									
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>

				
			</div>

@endsection
