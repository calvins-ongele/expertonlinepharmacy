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

                <div class='container alert'>
                    <div class=''>
                        <form id='newproduct'>
                            <input type="hidden" name="method" value="manage_products" />
                            <input type="hidden" name="action" value="update" />
                            <input type="hidden" name="csrf_token" value="<?= CSRF::get() ?>" />

                            <div class='row'>
                                <div class='col-md-6 mb-3'>
                                    <div class='form-group'>
                                        <label>Title <span class="slug"></span></label>
                                        <input type='text' name='title' class='form-control mb-1' value='<?= $this->data['title']??"" ?>' required>
                                        <input value='<?= $this->data['keyphrase']??"" ?>' type='text' style="min-width: 200px;" name='keyphrase' class='form-' placeholder="Keyphrase to rank for eg Fish farming" required>
                                    </div>
                                </div>
                                <div class='col-md-6 mb-3'>
                                    <div class='form-group'>
                                        <label>Product price</label>
                                        <input type='number' value='<?= $this->data['price']??"" ?>' step="0.1" name='price' class='form-control' required>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 mb-3'>
                                    <div class='form-group'>
                                        <label>Product Image (Optional) </label>
                                        <input type='file' name='file' class='form-control'   >
                                    </div>
                                </div> 
                             
                                 
                                <div class='col-md-6 mb-3'>
                                    <div class='form-group'>
                                        <label>Product Category </label>
                                        <select type='text' name='category' class='form-control' required>
                                            <option value='' hidden>Select category</option>
                                            <?php foreach ($this->categories as $row) { ?>
                                                <option value='<?= $row['id'] ?>' <?= $row['id']==$this->data['category_id']?'selected':'' ?>><?= $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                
                                <div class='col-md-12 mb-3'>
                                    <div class='form-group'>
                                        <label>Drug Type</label>
                                        <select type='text' name='injection' class='form-control' required>
                                            <option value='' hidden>Select drug type</option>
                                        
                                             <option value='pill'>Pill</option>
                                             <option value='injection'>Injection</option>
                                         
                                        </select>
                                    </div>
                                </div>
                            
                            <div class='row'>
                                <div class='col-md-12 mb-3'>
                                    <div class='form-group'>
                                        <label>Product Description</label>
                                        <div id='my-editor'></div>
                                    </div>
                                </div>

                                <div class='col-md-12 mb-2'>
                                    <div class='form-group'>
                                        <label>Product overview</label>
                                        <textarea name='meta_description' class='form-control' required><?= $this->data['overview']??"" ?></textarea>
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




                </div>


            </div>
        </div>


        <?php require DASHBOARD . 'includes/footer.inc.php' ?>

        <script>
            const editor = new ContentEditor({
                container: '#my-editor'
            });
            editor.set( `<?= $this->data['content']??"" ?>`);

            const analyzer = new SEOAnalyzer();
            analyzer.toggle();
            let metadescriptionTouched = false;


            document.querySelector("textarea[name='meta_description']").addEventListener('change', (e) => {
                metadescriptionTouched = true;
            });

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


            editor.on('key', function(e) {
                const editortext = e.data;
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
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Remove duplicate hyphens

                // Log it or assign it to another input 
                if (slugInput) slugInput.textContent = `/${slug}`;
            });

            const formElement = document.querySelector("#newproduct");
            const submitBtn = document.querySelector('input[type="submit"]');

            formElement.addEventListener('submit', async (e) => {
                e.preventDefault();

                const form = new FormData(formElement);
                form.set('slug', document.querySelector(".slug").textContent);
                form.set('content', editor.get());
                const response = await fetch("/myapp/requests", {
                    method: "POST",
                    body: form
                });
                const result = await response.json();


                Swal.fire({
                    title: "",
                    text: result.msg,
                    icon: result.error ? "error" : "success"
                });

                if (result.error) {
                    return;
                }
            });

           
        </script>

    </main>

</body>

</html>