<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multidatespicker/1.6.6/jquery-ui.multidatespicker.min.js">
</script> --}}

<script type="text/javascript">
    $(".toast").delay(5000).slideUp(1000, function() {
        $(this).alert('close');
    });
</script>

{{--  <script>
    $('.textarea').summernote({
        placeholder: 'Contents',
        tabsize: 10,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script> --}}


<script>
    function cleanHTML(html) {
        let div = document.createElement('div');
        div.innerHTML = html;

        // Remove unwanted tags
        div.querySelectorAll('script, style, link, meta').forEach(el => el.remove());

        // Remove unwanted attributes
        div.querySelectorAll('*').forEach(el => {
            [...el.attributes].forEach(attr => {
                if (!['href', 'src'].includes(attr.name)) {
                    el.removeAttribute(attr.name);
                }
            });
        });

        return div.innerHTML;
    }

    $('.textarea, #textarea').summernote({
        placeholder: 'Contents',
        tabsize: 10,
        height: 300,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview']]
        ],
        callbacks: {
            onPaste: function(e) {
                e.preventDefault();

                let clipboardData = (e.originalEvent || e).clipboardData;
                let html = clipboardData.getData('text/html');
                let text = clipboardData.getData('text/plain');

                let content = html ? cleanHTML(html) : text;

                document.execCommand('insertHTML', false, content);
            }
        }
    });
</script>

{{-- <script>
    $(document).ready(function() {
        $('.multi-dates').multiDatesPicker();
    });
</script> --}}
