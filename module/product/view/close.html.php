<?php
/**
 * The close file of project module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang<wwccss@gmail.com>
 * @package     product
 * @version     $Id: close.html.php 935 2013-01-16 07:49:24Z wwccss@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div id='mainContent' class='main-content'>
  <div class='main-header'>
    <h2>
      <span class='prefix'><?php echo html::icon($lang->icons['product']);?> <strong><?php echo $product->id;?></strong></span>
      <strong><?php echo html::a($this->createLink('product', 'view', "productID=$product->id"), $product->name);?></strong>
      <small><?php echo $lang->arrow . $lang->product->close;?></small>
    </h2>
  </div>
  <form class='load-indicator main-form' method='post' target='hiddenwin'>
    <table class='table table-form'>
      <tr>
        <th><?php echo $lang->comment;?></th>
        <td><?php echo html::textarea('comment', '', "rows='6' class='form-control kindeditor' hidefocus='true'");?></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <?php echo html::submitButton();?>
          <?php echo html::linkButton($lang->goback, $this->session->taskList);?>
        </td>
      </tr>
    </table>
  </form>
  <hr class='small' />
  <div class='main'>
    <?php include '../../common/view/action.html.php';?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
