<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
 
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="/"> <?= $this->_company['c_name'] ?></a>.</strong> All rights reserved.
</footer>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/jquery.overlayScrollbars.min.js"></script>
<script src="/assets/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='/assets/js/dashb.js?v=<?php echo rand() ?>'></script>
<script src='/public/js/dashb-main.js?v=<?php echo rand() ?>'></script>
<script src='/public/js/content-editor.js'></script>
<script src="/public/js/seo_analyzer.js"></script>
<?php require "public/includes/toast.inc.php" ?>
<script>
      async function copy(item) {
      try {
        await navigator.clipboard.writeText(item);
        console.log(`"${item}" copied to cliboard.`);
        showErrorToast(`"${item}" copied to cliboard.`, true);
      } catch (error) { 
        fallbackCopyTextToClipboard(item);
      }
    }

    function fallbackCopyTextToClipboard(text) {
      const textArea = document.createElement("textarea");
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      try {
        document.execCommand('copy');
        console.log('Fallback: Copying text command was successful');
      } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
      }
      document.body.removeChild(textArea);
    }
</script>