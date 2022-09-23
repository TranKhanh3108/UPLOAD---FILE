<!DOCTYPE html>
<html>
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/ajaxupload.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var thumb = $('img#thumb');
        new AjaxUpload('fileToUpload', {

            action: $('form#newHotnessForm').attr('action'),

            name: 'image',

            onSubmit: function(file, extension) {
                $('div.preview').addClass('loading');
            },

            onComplete: function(file, response) {
                thumb.load(function() {
                    $('div.preview').removeClass('loading');
                    thumb.unbind();
                });
                thumb.attr('src', response);
            }
        });
    });
</script>

<body>
    <h1>PHP - Upload file demo </h1>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
        Chọn file upload:
        <div class="preview"> <img id="thumb" width="100px" height="100px" src="./component/img/hinhgiaodien-02.png" /> </div>
        <span class="wrap hotness">
            <form id="newHotnessForm" action="/playground/ajax_upload">
                <label>Upload a Picture of Yourself</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Tải lên" name="submit">
            </form>
        </span>

    </form>
    <hr />

</body>

</html>