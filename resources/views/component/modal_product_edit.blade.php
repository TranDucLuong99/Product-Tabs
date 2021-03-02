<form id="demoForm" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2 style="text-align: center;">Update Product</h2>
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" name="title" minlength="2" class="form-control" placeholder="title"
               value="{{$product->title}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Body_html</label>
        <input type="text" name="body_html" minlength="2" class="form-control" placeholder="body_html"
               value="{{$product->body_html}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Vendor</label>
        <input type="text" name="vendor" minlength="2" class="form-control" placeholder="vendor"
               value="{{$product->vendor}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Product_type</label>
        <input type="text" name="product_type" minlength="2" class="form-control" placeholder="product_type"
               value="{{$product->product_type}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Published</label>
        <input type="text" name="published" minlength="2" class="form-control" placeholder="published">
    </div>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary sm">Update</button>

</form>
<script>
    $('body').ready(function () {
        $('#demoForm').validate({
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
