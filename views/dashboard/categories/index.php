<!DOCTYPE html>
<html lang="en">

<head>
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">

        <?php
        $pageid = 'products';
        require 'public/includes/counties.php';
        require DASHBOARD . 'includes/sidebar.inc.php' ?>



        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
            </div>
            <div class="content px-2">

                <div class="row">
                    <div class="col-md-6">
                        <div class='container alert'>
                            <section class=''>
                                <form id='newcategory'>
                                    <input type="hidden" name="method" value="manage_categories" />
                                    <input type="hidden" name="csrf_token" value="<?= CSRF::get() ?>" />
                                    <input type="hidden" name="action" value="insert" />
                                    <input type="hidden" name="id" value="" />

                                    <div class='row'>
                                        <div class='col-md-12 mb-2'>
                                            <div class='form-group'>
                                                <label>Keyphrase to rank for:  </label>
                                                <input placeholder="eg Fish Farming in kenya" name='keyphrase' class='form-control' required  > 
                                            </div>
                                        </div>
                                        <div class='col-md-12 mb-2'>
                                            <div class='form-group'>
                                                <label>Title of the product: slug: <u><span class="slug"></span></u></label>
                                                <input placeholder="Fish Farming in Kenya: Complete Beginner Guide" type='text' name='title' class='form-control' required> 
                                            </div>
                                        </div>
                                        <div class='col-md-12 mb-2'>
                                            <div class='form-group'>
                                                <label>One line description</label>
                                                <input type='text' name='oneline' class='form-control' required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-12 mb-2'>
                                            <div class='form-group fileContainer'>
                                                <label>Category Image</label>
                                                <input type='file' name='file' class='form-control' required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-12 mb-2'>
                                            <div class='form-group'>
                                                <label>Content Body</label>
                                                <textarea type='text' id='ckeditor' class='form-control'></textarea>
                                            </div>
                                        </div>

                                        
                                        <div class='col-md-12 mb-2'>
                                            <div class='form-group'>
                                                <label>Meta description</label>
                                                <textarea  name='meta_description' class='form-control' required></textarea>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class='row'>
                                        <div class='col-md-12 mb-3'>
                                            <div class='form-group'>
                                                <input type='submit' class='form-control btn btn-primary' value='Submit Now'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='feedback mt-2'></div>
                                </form>


                        </div>
 
                        </section>
                    </div>

                    <div class="col-md-6">
                        <section>
                            <div class="table-responsive">
                                <table class='table table-striped table-hover' id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($this->_categories as $row) {
                                            $i++; ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= strtoupper($row['title']) ?> </td>
                                                <td><a href='#' rel='<?= $row['id'] ?>' data='<?= json_encode($row) ?>'
                                                 class='badge badge-success editcontent'>Edit</a> </td>
                                                <td><a href='#' rel='<?= $row['id'] ?>' url='manage_categories' class='badge badge-danger delItem'>Delete</a> </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </section>
                    </div>
                </div> 
            </div>
        </div>


        <?php require DASHBOARD . 'includes/footer.inc.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
        <script src="/public/js/seo_analyzer.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            CKEDITOR.replace('ckeditor');
            //]]>
        </script>
        <script>
 
            const analyzer = new SEOAnalyzer();
            analyzer.toggle();
            let metadescriptionTouched = false;

        
            document.querySelector("textarea[name='meta_description']").addEventListener('change', (e)=> {
                metadescriptionTouched = true;
            } );
            function renderReport(editortext = "") { 

                const data = {
                    title: document.querySelector('input[name="title"]').value,
                    slug: document.querySelector('.slug').textContent,
                    metaDescription: document.querySelector('textarea[name="meta_description"]').value,
                    keyphrase: document.querySelector('input[name="keyphrase"]').value,
                    content: editortext
                };
                analyzer.data = data; 
                console.log(data); 
                analyzer.analyze();
            }
            function stripTags(htmlString) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = htmlString;
                return tempDiv.textContent || tempDiv.innerText || "";
            }
           
            CKEDITOR.instances.ckeditor.on('key', function(e) { 
                const editortext = this.getData(); 
                renderReport(editortext);
                const htmstring = editortext.split('</p>')[0] ?? "";     
                if (!metadescriptionTouched) {
                    const stripedtags = stripTags(htmstring);
                    document.querySelector("textarea[name='meta_description']").value = stripedtags;
                }
            }); 

            // Attach auto-update triggers to form fields
            document.querySelectorAll('input, textarea').forEach(el => {
                el.addEventListener('input', renderReport); 
            });

            
        //bonus input
        const titleInput = document.querySelector("input[name='title']");
        const slugInput = document.querySelector(".slug"); 

        titleInput.addEventListener('input', (e) => {
            const slug = e.target.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                .replace(/\s+/g, '-')         // Replace spaces with hyphens
                .replace(/-+/g, '-');         // Remove duplicate hyphens
            
            // Log it or assign it to another input 
            if (slugInput) slugInput.textContent = `/${slug}`;
        });

        const newcategory = document.querySelector("#newcategory");
        const submitBtn = document.querySelector('input[type="submit"]');

        newcategory.addEventListener('submit', async (e)=> {
            e.preventDefault();

            const form = new FormData(newcategory);  
            form.set('slug', document.querySelector(".slug").textContent );
            form.set('content', CKEDITOR.instances.ckeditor.getData() );
            const response = await fetch("/myapp/requests", {method:"POST", body: form});
            const result   = await response.json();

            
                Swal.fire({
                    title: "",
                    text: result.msg,
                    icon: result.error ? "error" : "success"
                });

            if (result.error) { 
                return;
            }
        });

        const table = document.getElementById('myTable');

         table.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('editcontent')) {  
              event.preventDefault(); 
              const data = JSON.parse(event.target.getAttribute('data'));

              console.log(data);
              document.querySelector('.fileContainer label').textContent = "Category Image (Optional)";
              document.querySelector('.fileContainer input').removeAttribute('required');
              document.querySelector('input[name="action"]').value = "update";
              document.querySelector('input[name="id"]').value = data.id ?? "";
              document.querySelector('input[name="title"]').value = data.title ?? "";
              document.querySelector('input[name="keyphrase"]').value = data.keyphrase ?? ""; 
              document.querySelector('input[name="oneline"]').value = data.quote_desc ?? "";
              document.querySelector('textarea[name="meta_description"]').value = data.meta_description ?? "";
              CKEDITOR.instances.ckeditor.setData( data.content ?? "" )

            }
         });

        </script>
    </main>

</body>

</html>