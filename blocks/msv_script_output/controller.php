<?php

namespace Concrete\Package\MsvScriptOutput\Block\MsvScriptOutput;
use Concrete\Core\Block\BlockController;
use Concrete\Core\User\Group\Group;

class Controller extends BlockController {

	protected $btTable = 'btMsvScriptOutput';
	protected $btInterfaceWidth = "600";
	protected $btInterfaceHeight = "580";
	protected $btCacheBlockRecord = false;
	protected $btCacheBlockOutput = false;
	protected $btCacheBlockOutputOnPost = false;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btDefaultSet = 'basic';

	public function getBlockTypeDescription() {
		return t("A block to control the output of ad-hoc scripts");
	}

	public function getBlockTypeName() {
		return t("Script Output");
	}

	public function on_page_view() {
		$page = \Page::getCurrentPage();

		$u = new \User();

		if(!$u->isSuperUser() && !$u->inGroup(Group::getByName('Administrators')) && !$page->isEditMode()){
			if ($this->header_content) {
				$this->addHeaderItem($this->header_content);
			}

			if ($this->footer_content) {
				$this->addFooterItem($this->footer_content);
			}
		}
	}

	public function view(){
		$this->set('content', $this->content);
		$this->set('placeholderText', $this->placeholderText);
		$this->set('header_content', $this->header_content);
		$this->set('footer_content', $this->footer_content);
	}

	public function save($data) {
		$args['placeholderText'] = isset($data['placeholderText']) ? substr(trim($data['placeholderText']), 0, 255) : '';
		$args['content'] = isset($data['content']) ? trim($data['content']) : '';
		$args['header_content'] = isset($data['header_content']) ? trim($data['header_content']) : '';
		$args['footer_content'] = isset($data['footer_content']) ? trim($data['footer_content']) : '';
		parent::save($args);
	}

	public function xml_highlight($s){
		$s = htmlspecialchars($s);
		$s = preg_replace("#&lt;([/]*?)(.*)([\s]*?)&gt;#sU",
			"<font color=\"#0000FF\">&lt;\\1\\2\\3&gt;</font>",$s);
		$s = preg_replace("#&lt;([\?])(.*)([\?])&gt;#sU",
			"<font color=\"#800000\">&lt;\\1\\2\\3&gt;</font>",$s);
		$s = preg_replace("#&lt;([^\s\?/=])(.*)([\[\s/]|&gt;)#iU",
			"&lt;<font color=\"#808000\">\\1\\2</font>\\3",$s);
		$s = preg_replace("#&lt;([/])([^\s]*?)([\s\]]*?)&gt;#iU",
			"&lt;\\1<font color=\"#808000\">\\2</font>\\3&gt;",$s);
		$s = preg_replace("#([^\s]*?)\=(&quot;|')(.*)(&quot;|')#isU",
			"<font color=\"#800080\">\\1</font>=<font color=\"#FF00FF\">\\2\\3\\4</font>",$s);
		$s = preg_replace("#&lt;(.*)(\[)(.*)(\])&gt;#isU",
			"&lt;\\1<font color=\"#800080\">\\2\\3\\4</font>&gt;",$s);
		return nl2br($s);
	}
}
