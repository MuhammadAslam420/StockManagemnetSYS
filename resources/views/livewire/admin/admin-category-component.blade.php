<div class="content">
    @livewire('admin.navbar-component')
    <div class="container">
        <div class="card">
            <div class="acrd-header">
                <div>
                    <h3 class="card-title pt-3 ml-2">Add New Category</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="name" />
                                    <label for="name">Category Name</label>
                                </div>
                                <div class="col-md-6 form-floating mb-3">
                                    <input class="form-control" id="slug" type="text" name="slug" />
                                    <label for="slug">Category Slug</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <button type="submit" class="btn btn-success bg-info">Add Category</button>
                            </div>
                    </form>
                </div>
                <div class="col-md-12 mt-5">
                    <h2 class="card-title">All Categories</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>