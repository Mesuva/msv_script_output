<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php 
$page = \Page::getCurrentPage();
$u = new User();

if(!$u->isSuperUser() && !$u->inGroup(\Concrete\Core\User\Group\Group::getByName('Administrators')) && !$page->isEditMode()){
	echo $content; 
} else {
	echo '<p class="alert alert-info"><i class="fa fa-warning"></i> <strong>';

	if ($placeholderText) {
		echo $placeholderText;
	} else {
		echo t('Additional HTML/Scripts');
	}

	echo '</strong>';

	$outputs = array();
	
	if ($content) {
		$outputs[] = t('block location');
	}
	
	if ($header_content) {
		$outputs[] = t('document head');
	}
	
	if ($footer_content) {
		$outputs[] = t('before close of body');
	}
	
	if (count($outputs) > 0) {
		echo ' - '.  t('outputting to') . ' ';
	
		$last = array_pop($outputs);
		if(count($outputs) > 0) {
		    echo implode(", ", $outputs) . " and " . $last;
		} else {
		    echo $last;
		}
		
		echo '</p>';
	
	} else {
		echo ' - <em>' . t('no outputs'). '</em></p>';
	}
}
?>
