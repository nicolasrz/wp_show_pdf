<div class="row alignfull">

    <div class="col-1-4">
        <ul>
            <?php foreach ($listPdf as $pdf) : ?>
                <li class="pdf_name" data-url="<?= $pdf['url']; ?>"><?= $pdf['name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-3-4">
        <div id="information">Click on pdf on the left side :)</div>
        <object id="pdf_embedded" width="800" height="1200" type="application/pdf" data="">
            <p>Error visualising PDF</p>
        </object>
    </div>
</div>


<script>
    function displayPdf(dom) {
        dom.addEventListener("click", function (e) {
            var pdfUrl = e.target.dataset.url;
            var embeddedPdf = document.getElementById("pdf_embedded")
            embeddedPdf.data = pdfUrl + "#zoom=125&scrollbar=1&toolbar=1&navpanes=1";
            document.getElementById("information").classList.add('hide');
        })
    }

    var liPdf = document.getElementsByClassName("pdf_name");
    for (var i = 0; i < liPdf.length; i++) {
        displayPdf(liPdf[i]);
    }

</script>


