<script>
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel"><?php echo e(translate('Confirmation')); ?></h4>
            </div>

            <div class="modal-body">
                <p><?php echo e(translate('Delete confirmation message')); ?></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                <a id="delete_link" class="btn btn-danger btn-ok"><?php echo e(translate('Delete')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/comfortwear/web/comfortwearbd.com/public_html/resources/views/frontend/partials/modal.blade.php ENDPATH**/ ?>