<form id="form" action="{{route('navbar.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="name ...">
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea id="content_ckeditor" type="text" name="content" class="form-control"
                  placeholder="content ..."></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Product</label>
        <select id="keyword" class="locationMultiple form-control sl2" multiple="multiple" name="product_ids[]">
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><span> <i class="fa fa-save"></i>Send</span></button>
</form>
<script>
    $('body').ready(function () {
        $('#form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 30
                },
                content: {
                    required: true,
                    minlength: 5
                },
            }

        });
    });
</script>
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
    $(".locationMultiple").select2({
        width: null
    })
</script>
<script>
    $('.select2-search__field').keyup(function () {
        let query = $(this).val();
        let url = '{{route('search_autocomplete')}}';
        // alert(query);
        if (query != '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: url,
                data: {search: query}
            })
                .done(function (msg) {
                    // alert(query);
                    $('.sl2').html(msg);
                });
        }
    });
</script>
<script>
    CKEDITOR.replace('content_ckeditor');
</script>