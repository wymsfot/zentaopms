<?php
/**
 * The link bug view of release module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     release
 * @version     $Id: linkbug.html.php 5096 2013-07-11 07:02:43Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<div id='queryBox' class='show'></div>
<?php
$releaseBugs = $type == 'bug' ? $release->bugs : $release->leftBugs;
$formID      = $type == 'leftBug' ? 'unlinkedLeftBugsForm' : 'unlinkedBugsForm';
?>
<div id='<?php echo $type == 'bug' ? 'unlinkBugList' : 'unlinkLeftBugList';?>'>
  <form class='main-table' method='post' target='hiddenwin' id='<?php echo $formID?>' action='<?php echo $this->createLink('release', 'linkBug', "releaseID=$release->id&browseType=$browseType&param=$param&type=$type")?>'>
    <div class='table-header'>
      <div class='table-statistic'><?php echo html::icon('unlink');?> &nbsp;<strong><?php echo $lang->productplan->unlinkedBugs;?></strong></div>
    </div>
    <table class='table'> 
      <thead>
        <tr>
          <th class='c-id'> <?php echo $lang->idAB;?></th>
          <th class='w-pri'><?php echo $lang->priAB;?></th>
          <th>              <?php echo $lang->bug->title;?></th>
          <th class='w-user text-left'>  <?php echo $lang->openedByAB;?></th>
          <th class='w-user'> <?php echo $lang->bug->resolvedBy;?></th>
          <th class='w-80px'>  <?php echo $lang->statusAB;?></th>
        </tr>
      </thead>
      <tbody>
        <?php $unlinkedCount = 0;?>
        <?php foreach($allBugs as $bug):?>
        <?php if(strpos(",{$releaseBugs},", ",$bug->id,") !== false) continue;?>
        <tr>
          <td class='c-id'>
            <input class='ml-10px' type='checkbox' name='bugs[<?php echo $bug->id?>]'  value='<?php echo $bug->id;?>' <?php if($type == 'leftBug' or $bug->status == 'resolved' or $bug->status == 'closed') echo "checked";?> /> 
            <?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id"), $bug->id);?>
          </td>
          <td><span class='<?php echo 'pri' . zget($lang->bug->priList, $bug->pri, $bug->pri);?>'><?php echo zget($lang->bug->priList, $bug->pri, $bug->pri)?></span></td>
          <td class='text-left nobr' title='<?php echo $bug->title?>'><?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id", '', true), $bug->title, '', "data-toggle='modal' data-type='iframe' data-width='90%'");?></td>
          <td><?php echo $users[$bug->openedBy];?></td>
          <td><?php echo $users[$bug->resolvedBy];?></td>
          <td class='text-center bug-<?php echo $bug->status?>'><?php echo $lang->bug->statusList[$bug->status];?></td>
        </tr>
        <?php $unlinkedCount++;?>
        <?php endforeach;?>
      </tbody>
      <?php if($unlinkedCount):?>
      <tfoot>
        <tr>
          <td colspan='6' class='text-left table-footer'>
            <div class='clearfix'>
              <?php
              echo html::selectButton() . html::submitButton($lang->release->linkBug);
              echo html::a(inlink('view', "releaseID=$release->id&type=$type"), $lang->goback, '', "class='btn'");
              ?>
            </div>
          </td>
        </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </form>
</div>
<script>
$(function()
{
    ajaxGetSearchForm('#<?php echo $type == 'bug' ? 'bugs' : 'leftBugs'?> .linkBox #queryBox')
    setModal();
})
</script>
