                    <div class="task">
                      <div class="row">
                        <div class="span3"><b style="size:125%;"><?=$task->getName()?></b></div>    
                        <div class="span4 offset2">
                          (<?=$task->getStartDate()->format("Y-m-d")?>&nbsp;-&nbsp;<?=$task->getEndDate()->format("Y-m-d")?>)
                          &nbsp;
                          [<?=$task->getStartSchedule()?>&nbsp;-&nbsp;<?=$task->getEndSchedule()?>]
                        </div>
                      </div>
                      <div class="row">
                        <!--<div class="span2">Num Users Needed: <?=$task->getNumUsersNeeded()?></div>-->
                        <div class="span1 align-right"><b>Description:</b></div> 
                        <div class="span7 offset1"><?=$task->getDescription()?></div>
                        <div class="span1"><b>Reward:</b></div> 
                        <div class="span7 offset1"><?=$task->getReward()?></div>
                        <div class="span1"><b>Requeriments:</b></div> 
                        <div class="span7 offset1"><?=$task->getRequeriments()?></div>
                      </div>
                    </div>