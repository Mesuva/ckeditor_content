<?php
// Author: Ryan Hewitt - http://www.mesuva.com.au
namespace Concrete\Package\CkeditorContent;
use Package;
use BlockType;
use AssetList;
use Asset;

class Controller extends Package {

    protected $pkgHandle = 'ckeditor_content';
    protected $appVersionRequired = '5.7.3';
    protected $pkgVersion = '0.9.3';

    public function getPackageDescription() {
        return t("A content block based on CKEditor");
    }

    public function getPackageName() {
        return t("CKEditor Content");
    }

    public function install() {
        $pkg = parent::install();
        $this->configurePackage($pkg);
    }


    public function configurePackage($pkg) {
        $blk = BlockType::getByHandle('ckeditor_content');
        if(!is_object($blk) ) {
            BlockType::installBlockTypeFromPackage('ckeditor_content', $pkg);
        }
    }

    public function on_start() {
        $al = AssetList::getInstance();

        $al->register( 'javascript', 'ckeditor', 'vendor/ckeditor/ckeditor.js', array('version' => '4.4.6', 'position' => Asset::ASSET_POSITION_FOOTER, 'minify' => false, 'combine' => false), $this );
         $al->registerGroup('ckeditor',
            array(
                array('javascript', 'ckeditor')
            )
        );

    }


}