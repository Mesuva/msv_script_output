<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<div id="script_injector_block<?php echo intval($bID)?>" class="script_injector_block" style="max-height:300px; overflow:auto">
    <h4><?php echo $placeholderText ? $placeholderText : t('Additional HTML/Scripts'); ?></h4>
    <?php if ($content) { ?>
        <?php echo Concrete\Package\MsvScriptOutput\Block\MsvScriptOutput\Controller::xml_highlight(($content)) ?></div>
    <?php } ?>

    <?php if ($header_content) { ?>
        <div><?php echo Concrete\Package\MsvScriptOutput\Block\MsvScriptOutput\Controller::xml_highlight(($header_content)) ?></div>
    <?php } ?>

    <?php if ($footer_content) { ?>
        <div><?php echo Concrete\Package\MsvScriptOutput\Block\MsvScriptOutput\Controller::xml_highlight(($footer_content)) ?></div>
    <?php } ?>
</div>