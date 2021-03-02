
<form id="demoForm" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2 style="text-align: center">Add Product</h2>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" minlength="2" id="title" class="form-control" placeholder="title">
    </div>
    <div class="form-group">
        <label for="text">Body_html</label>
        <input type="text" name="body_html" minlength="2" id="text" class="form-control" placeholder="body_html">
    </div>
    <div class="form-group">
        <label for="vendor">Vendor</label>
        <input type="text" name="vendor" minlength="2" id="vendor" class="form-control" placeholder="vendor">
    </div><div class="form-group">
        <label for="product_type">Product_type</label>
        <input type="text" name="product_type" minlength="2" id="product_type" class="form-control" placeholder="product_type">
    </div><div class="form-group">
        <label for="published">Published</label>
        <input type="text" name="published" minlength="2" id="published" class="form-control" placeholder="published">
    </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary sm">Add</button>

</form>
<script>
    $('body').ready(function () {
        $('#demoForm').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                summary: {
                    required: true,
                    minlength: 5
                },
                description: {
                    required: true,
                    minlength: 5
                }
            }
        });
    });
</script>
