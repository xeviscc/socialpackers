                        <!-- COMMENTS FOR ITEM -->
                        <? $itemType = $item->getType()->getType() ?>
                        <? $idCommList = $itemId.$item->getType()->getType() ?>
                        <div class="row">
                          <div class="span6 offset1 rounded-box">
                            <div id="id_comment_list_<?=$idCommList?>">
                              <? if(isset($comments_list) && isset($comments_list[$idCommList])) { ?>
                              <? foreach($comments_list[$idCommList] as $c) { ?>
                                <div>
                                  <img src="<?=$c->getIdUser()->getPicture()?>" style="height:30px;width:30px;"/>
                                  &nbsp;
                                  <a href="<?=site_url('user/detail/'.$c->getIdUser()->getId())?>">@<?=$c->getIdUser()->getName()?></a>
                                  &nbsp;<?=$c->getComment()?>
                                </div>
                              <? } ?>
                              <? } ?>
                            </div>
                            <input type="textarea" id="id_comment_<?=$idCommList?>"  class="span5">
                            <div class="btn" href="#" onclick="st_comments.saveReplyComment(<?=$itemId?>, 'id_comment_<?=$idCommList?>', 'id_comment_list_<?=$idCommList?>', '<?=$itemType?>');" placeholder="Comment..." >Comment</div>
                          </div>
                        </div>
                        <!-- END COMMENTS FOR ITEM -->