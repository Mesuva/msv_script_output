<?php defined('C5_EXECUTE') or die("Access Denied.");


if (!isset($placeholderText)) {
    $placeholderText = '';
}

if (!isset($content)) {
    $content = '';
}

if (!isset($header_content)) {
    $header_content = '';
}

if (!isset($footer_content)) {
    $footer_content = '';
}
?>

<div class="script-injector-block-fields">
    <div class="form-group">
        <?php echo $form->label($view->field('placeholderText'), t('Placeholder label (optional)')) ?>
        <?php echo $form->text($view->field('placeholderText'), h($placeholderText), array('maxlength'=>255)); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label($view->field('content'), t('Output HTML/Scripts at block location')) ?>
        <?php echo $form->textarea($view->field('content_input'), h($content), array('rows' => 5)); ?>
        <?php echo $form->hidden($view->field('content'), ''); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label($view->field('header_content'), t('Extra header content')) ?>
        <?php echo $form->textarea($view->field('header_content_input'), h($header_content), array('rows' => 2)); ?>
        <?php echo $form->hidden($view->field('header_content'), ''); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label($view->field('footer_content'), t('Extra footer content')) ?>
        <?php echo $form->textarea($view->field('footer_content_input'), h($footer_content), array('rows' => 2)); ?>
        <?php echo $form->hidden($view->field('footer_content'), ''); ?>
    </div>
</div>

<script>

    $(function() {
        $('#ccm-form-submit-button').click(function(){
            // encode to base64 before submitting to prevent trigging modsecurity

            let contentInput = $('#content_input');
            $('#content').val(b64EncodeUnicode(contentInput.val()));
            contentInput.prop('disabled', true)

            let headerInput = $('#header_content_input');
            $('#header_content').val(b64EncodeUnicode(headerInput.val()));
            headerInput.prop('disabled', true)

            let footerInput = $('#footer_content_input');
            $('#footer_content').val(b64EncodeUnicode(footerInput.val()));
            footerInput.prop('disabled', true)
        });
    });

    function b64EncodeUnicode(str) {
        return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
            return String.fromCharCode('0x' + p1);
        }));
    }

</script>
