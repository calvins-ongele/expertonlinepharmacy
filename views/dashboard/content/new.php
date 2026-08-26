<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
    <style>
       
        .upload-container {
            position: relative;
            width: 80%;
            height: 400px;
            border: 2px dashed #007bff;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            cursor: pointer;
            text-align: center;
        }

        .upload-container h2 {
            color: #007bff;
        }

        .hidden-file-input {
            display: none;
        }

        #progress-container {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'content';
        require 'public/includes/counties.php';
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form id='xnewproduct'>
                                
                                 
                                
                                
    <div class="upload-container" id="drop-zone">
        <h2>Drag and drop your video here, or click to upload</h2>
        <input type="file" class="hidden-file-input" id="video-upload-input" accept="video/*">
        <div id="progress-container">
            <p>Uploading: <span id="progress-text">0%</span></p>
        </div>
    </div>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('video-upload-input');
        const progressContainer = document.getElementById('progress-container');
        const progressText = document.getElementById('progress-text');
        let selectedFile = null;
        const chunkSize = 1024 * 1024 * 5; // 5MB per chunk

        dropZone.addEventListener('click', () => {
            fileInput.click();
        });

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.backgroundColor = '#e0e0e0';
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.style.backgroundColor = 'white';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.backgroundColor = 'white';
            selectedFile = e.dataTransfer.files[0];
            startUpload();
        });

        fileInput.addEventListener('change', (e) => {
            selectedFile = e.target.files[0];
            startUpload();
        });

        async function startUpload() {
            if (!selectedFile) return;

            progressContainer.style.display = 'block';
            await uploadInChunks(selectedFile);
        }

        async function uploadInChunks(file) {
            const totalChunks = Math.ceil(file.size / chunkSize);
            let uploadedChunks = 0;

            for (let start = 0; start < file.size; start += chunkSize) {
                const chunk = file.slice(start, start + chunkSize);
                const formData = new FormData();
                formData.append('chunk', chunk);
                formData.append('fileName', file.name);
                formData.append('totalChunks', totalChunks);
                formData.append('chunkIndex', uploadedChunks);

                const response = await fetch('/myapp/upload-video', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    alert('Upload failed');
                    return;
                }

                uploadedChunks++;
                progressText.textContent = `${Math.round((uploadedChunks / totalChunks) * 100)}%`;
            }

            const uploadCompleteResponse = await fetch('/myapp/finalize-upload-video', {
                method: 'POST',
                body: JSON.stringify({ fileName: file.name }),
                headers: { 'Content-Type': 'application/json' }
            });

            const responseData = await uploadCompleteResponse.json();
            if (responseData.status === 'success') {
                const videoId = responseData.videoId;
                window.location.href = `/dashboard/content/edit?vid=${videoId}`;
            }
        }
    </script>
                                
                                <div class='feedback mt-2'></div>
                            </form>
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script type="text/javascript">
         
            //<![CDATA[
            CKEDITOR.replace( 'ckeditor');
            //]]>
        </script>
    
    </main> 
 
</body>

</html>