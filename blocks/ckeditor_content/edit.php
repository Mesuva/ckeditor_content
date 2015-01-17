<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<ul class="ccm-inline-toolbar">
  <li class="ccm-inline-toolbar-button ccm-inline-toolbar-button-cancel">
  <button  class="btn cancel-inline"><?php echo t('Cancel'); ?></button>
  </li>

  <li class="ccm-inline-toolbar-button ccm-inline-toolbar-button-save">
    <button class="btn btn-primary save-inline"><?php echo t('Save'); ?></button>
  </li>

</ul>

<textarea id="<?php echo $bID; ?>_content"  contenteditable="true" name="content"><?php  echo $content; ?></textarea>

<script>
  // Turn off automatic editor creation first.
  CKEDITOR.disableAutoInline = true;
  CKEDITOR.inline( '<?php echo $bID; ?>_content', {
     startupFocus: true,
      floatSpaceDockedOffsetX: 150,
      floatSpaceDockedOffsetY: 14
  });

  $('.cancel-inline').click(function(){
    ConcreteEvent.fire('EditModeExitInline');
    Concrete.getEditMode().scanBlocks();
  });

  $('.save-inline').click(function(){

    $('#ccm-block-form').submit();
    ConcreteEvent.fire('EditModeExitInlineSaved');
    ConcreteEvent.fire('EditModeExitInline', {
      action: 'save_inline'
    });
  });


</script>

<style>

  .cke_textarea_inline {
    outline: none;
  }

  #ccm-menu-click-proxy, .ccm-area-footer {
    display: none;
  }

</style>



