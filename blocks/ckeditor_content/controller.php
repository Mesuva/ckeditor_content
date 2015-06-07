<?php
namespace Concrete\Package\CkeditorContent\Block\CkeditorContent;
use \Concrete\Core\Block\BlockController;
use Loader;
use Core;

class Controller extends BlockController {
	
	protected $btName = 'Content (CKEditor)';
	protected $btTable = 'btCKEditorContent';

	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;

	protected $btSupportsInlineEdit = true;
	protected $btSupportsInlineAdd = true;
	protected $btDefaultSet = 'basic';
	
	public function getSearchableContent() {
		return $this->content;
	}

	public function getBlockTypeName()
	{
		return t($this->btName);
	}

	public function getBlockTypeDescription() {
		return t("A content block based on CKEditor");
	}

	public function save($args) {
 		parent::save($args);
	}

	public function add(){
		$this->requireAsset('ckeditor');
	}

	public function edit() {
		$this->requireAsset('ckeditor');
	}

}
