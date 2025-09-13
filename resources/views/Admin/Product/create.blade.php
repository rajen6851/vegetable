@include('Admin.layout.head')

<body data-topbar="dark">

    <div id="layout-wrapper">

        @include('Admin.layout.navbar')
        @include('Admin.layout.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Add Product</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="">Products</a></li>
                                        <li class="breadcrumb-item active">Add Product</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">New Product Form</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <!-- Product Name -->
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Product Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Price -->
                                            <div class="col-md-6 mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Category -->
                                            <div class="col-md-6 mb-3">
                                                <label for="category_id" class="form-label">Category</label>
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Unit -->
                                            <div class="col-md-6 mb-3">
                                                <label for="unit" class="form-label">Unit</label>
                                                <input type="text" name="unit" class="form-control" value="{{ old('unit', 'kg') }}">
                                            </div>

                                            <!-- Stock -->
                                            <div class="col-md-6 mb-3">
                                                <label for="stock" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}">
                                            </div>

                                            <!-- Status -->
                                            <div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
</div>


                                            <!-- Description -->
                                            <div class="col-12 mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                            </div>

                                            <!-- Image -->
                                            <div class="col-12 mb-3">
                                                <label for="image" class="form-label">Product Image</label>
                                                <input type="file" name="image" class="form-control">
                                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <a href="" class="btn btn-light">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('Admin.layout.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('Admin.layout.rightsidebar')
    @include('Admin.layout.footjs')

</body>
</html>
