<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="script-injector-block-fields">
    <div class="form-group">
        <?php echo $form->label($view->field('placeholderText'), t('Placeholder label (optional)')) ?>
        <?php echo $form->text($view->field('placeholderText'), htmlentities($placeholderText)); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label($view->field('content'), t('Output HTML/Scripts at block location')) ?>
        <?php echo $form->textarea($view->field('content'), htmlentities($content), array('rows' => 5)); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label($view->field('header_content'), t('Extra header content')) ?>
        <?php echo $form->textarea($view->field('header_content'), htmlentities($header_content), array('rows' => 2)); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label($view->field('footer_content'), t('Extra footer content')) ?>
        <?php echo $form->textarea($view->field('footer_content'), htmlentities($footer_content), array('rows' => 2)); ?>
    </div>
</div>