<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Overview
   <small>statistics, charts, recent events and reports</small>
   <small>(You past 30 days)</small>
</h1>
<!-- END PAGE TITLE-->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="icon-home"></i>
         <a href="<?php echo base_url('admin/'); ?>">Home</a>
         <i class="fa fa-angle-right"></i>
      </li>
      <li>
         <span>Dashboard </span><small> (statistics, charts, recent events and reports)</small>
      </li>
   </ul>
   <div class="page-toolbar">
      <div class="pull-right tooltips btn btn-fit-height blue-hkt"  data-placement="top" data-original-title="Hits">

         <a onclick="printDiv('printableArea')" style="color:#ffffff" data-toggle="modal"><i class="fa fa-plus"></i> More... </a>
      </div>
   </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN DASHBOARD STATS 1-->
<div id="printableArea">
<div class="row">
   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a class="dashboard-stat dashboard-stat-v2 blue-hkt" href="#">
         <div class="visual">
            <i class="fa fa-users"></i>
         </div>
         <div class="details">
            <div class="number">
               <span data-counter="counterup" data-value="
                  <?php $count = 0; ?>
                  <?php foreach ($current_user as $user) { ?>
                  <?php $count = $count + 1; ?>
                  <?php } ?> <?php echo $count; ?>">0</span>
            </div>
            <div class="desc"> DAILY CURRENT USER </div>
         </div>
      </a>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a class="dashboard-stat dashboard-stat-v2 yellow-gold" href="#">
         <div class="visual">
            <i class="icon-users"></i>
         </div>
         <div class="details">
            <div class="number">
               <span style="font-size: xx-small;">NEW</span>
			   <span data-counter="counterup" data-value="
                  <?php foreach ($today_newJoin as $newJoin) { ?>
                  <?php echo $newJoin->new_join; ?>
                  <?php } ?>">0</span> :
               <span data-counter="counterup" data-value="
                  <?php foreach ($today_revisit as $revisit) { ?>
                  <?php echo $revisit->revisit; ?>
                  <?php } ?>">0</span><span style="font-size: xx-small;">REVISIT</span>
            </div>
            <div class="desc">DAILY NEW vs REVISIT</div>
         </div>
      </a>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a class="dashboard-stat dashboard-stat-v2 green" href="#">
         <div class="visual">
            <i class="fa fa-venus-double"></i>
         </div>
         <div class="details">
            <div class="number">
               <i class="fa fa-male" style="font-size: x-large;"></i>
			   <span data-counter="counterup" data-value="
                  <?php $male = $gender[0]->Male;
                     $total = $male + $gender[0]->Female;
                     $ratio = ($male/$total)*10;
                     echo round($ratio); ?>">0</span> 
			    :
			   <span data-counter="counterup" data-value="<?php echo (10-round($ratio)); ?>">0</span> 
			   <i class="fa fa-female" style="font-size: x-large;"></i>
            </div>
            <div class="desc"> PAST 30 DAYS GENDER RATIO</div>
         </div>
      </a>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
         <div class="visual">
            <i class="icon-login"></i>
         </div>
         <div class="details">
            <div class="number">
               <span data-counter="counterup" data-value="
                  <?php $success = ($login[0]->success);
                     $total = $login[0]->not_success + $success;
                     $ratio = ($success / $total) * 100;
                     echo  round($ratio); ?>
                  "></span>%
            </div>
            <div class="desc"> LOGIN COMPLETED</div>
            <div class="desc"> COUNT IN TOTAL</div>
         </div>
      </a>
   </div>
</div>
<div class="row">
   <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject bold uppercase font-dark">New | Revisit </span>
               <span class="caption-helper">You past 30 days</span>
            </div>
            <div class="actions">
               <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
            </div>
         </div>
         <div class="portlet-body">
            <div id="30day_visitRevisit" class="CSSAnimationChart" style="height: 450px"></div>
         </div>
      </div>
   </div>
   <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption ">
               <span class="caption-subject font-dark bold uppercase">LOGIN METHOD PROPORTION</span>
               <span class="caption-helper">You past 30 days</span>
            </div>
            <div class="actions">
               <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
            </div>
         </div>
         <div class="portlet-body">
            <div id="30day_loginMethod" class="CSSAnimationChart" style="height: 450px"></div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject bold uppercase font-dark">USER USAGE LINE CHART </span>
               <span class="caption-helper">You past 30 days</span>
            </div>
            <div class="actions">
               <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
            </div>
         </div>
         <div class="portlet-body">
            <div id="30day_inputOutput" class="CSSAnimationChart" style="height: 450px;"></div>
         </div>
      </div>
   </div>
   <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="portlet light">
         <div class="portlet-title">
            <div class="caption">
               <i class="icon-cursor font-dark hide"></i>
               <span class="caption-subject font-dark bold uppercase">DATA USAGE INDEX</span>
               <span class="caption-helper">Yor past 30 days</span>
            </div>
         </div>
         <div class="portlet-body">
            <div class="row" style="height: 100px">
               <div class="col-md-6">
                  <div class="easy-pie-chart">
                     <div class="number transactions" data-percent="<?php 
                        $i = 0;
                         $arr2= array();
                         foreach ($average_output as $key) {
                            $arr2[$i] = $key->output;
                            $i++;
                         }
                         $average = array_sum($arr2)/ count($arr2);
                         $average1 = $average * (0.000001);
                         echo round($average1); ?>">
                        <span><?php echo round($average1);?></span>MB 
                     </div>
                     <div class="stat-number">
                        <div class="title"> AVG USAGE OUTPUT</div>
                     </div>
                  </div>
               </div>
               <div class="margin-bottom-10 visible-sm"> </div>
               <div class="col-md-6">
                  <div class="easy-pie-chart">
                     <div class="number visits" data-percent="<?php 
                        $i = 0;
                         $arr3= array();
                         foreach ($average_input as $key) {
                            $arr3[$i]= $key->input;
                            $i++;
                         }
                         $average = array_sum($arr3)/ count($arr3);
                         $average1 = $average * (0.000001);
                         echo round($average1); ?> ">
                        <span><?php echo round($average1);?></span>MB 
                     </div>
                     <div class="stat-number">
                        <div class="title"> AVG USAGE INTPUT</div>
                     </div>
                  </div>
               </div>
               <div class="margin-bottom-10 visible-sm"> </div>
            </div>
         </div>
      </div>
	  <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption caption-md">
               <i class="icon-bar-chart font-dark hide"></i>
               <span class="caption-subject font-dark bold uppercase">OPERSTING SYSTEM SUMMARY</span>
               <span class="caption-helper">( Count in total )</span>
            </div>
         </div>
         <div class="portlet-body">
            <?php if ($os_summary == true) {?>
            <div class="table-scrollable table-scrollable-borderless">
               <table class="table table-hover table-light">
                  <thead>
                     <tr class="uppercase">
                        <th>Ranking</th>
                        <th>OS</font></th>
                        <th>Operating System</th>
                        <th>Client</th>
                     </tr>
                  </thead>
                  <?php $i = 1;
                  foreach ($os_summary as $os) {?>
                  <?php if($os->os !== 'Unknown Platform') {?>
                  <tr>
                     <td><?php echo $i++; ?></td>
                     <td><i class="fa fa-<?php if ($os->os == "iOS" || $os->os == "Mac OS X") {echo "apple";} else {echo strtolower($os->os);} ?>"></i></td>
                     <td><a href="<?php echo base_url("admin/connected_devices")?>" class="primary-link"><?php echo $os->os; ?></a></td>
                     <td><?php echo $os->total; ?></td>
                  </tr>
                  <?php } ?>
                  <?php } ?>
               </table>
               </div>
               <?php } else {?> 
                <div class="mt-comment-text">The table contains no data</div>
               <?php }?>
            </div>
         </div>
      
   </div>
</div>
<div class="row">
   <div class="col-lg-4 col-xs-12 col-sm-12">
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject bold uppercase font-dark">TOP USAGE Zones</span>
               <span class="caption-helper">You past 30 days</span>
            </div>
            <div class="actions">
               <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
            </div>
         </div>
         <div class="portlet-body">
            <div id="30day_topAP" class="CSSAnimationChart" style="height: 300px"></div>
         </div>
      </div>
   </div>
   <div class="col-lg-4 col-xs-12 col-sm-12">
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject bold uppercase font-dark">GENDER PROPORTION</span>
               <span class="caption-helper">You past 30 days</span>
            </div>
            <div class="actions">
               <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
            </div>
         </div>
         <div class="portlet-body">
            <div id="30day_gender" class="CSSAnimationChart" style="height: 300px"></div>
         </div>
      </div>
   </div>
   <div class="col-lg-4 col-xs-12 col-sm-12">
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject bold uppercase font-dark">success Login</span>
               <span class="caption-helper">You past 30 days</span>
            </div>
            <div class="actions">
               <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
            </div>
         </div>
         <div class="portlet-body">
            <div id="30day_login" class="CSSAnimationChart" style="height: 300px"></div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="portlet light bordered">
         <div class="portlet-title tabbable-line">
            <div class="caption">
               <i class="icon-bubbles font-dark hide"></i>
               <span class="caption-subject font-dark bold uppercase">MOST RECENT USER</span>
            </div>
         </div>
         <div class="portlet-body">
            <div class="tab-pane active" id="">
               <div class="mt-comments">
               <?php if ($output == true) {?>
				  <?php foreach ($output as $user) {?>
                  <div class="mt-comment">
                     <div class="mt-comment-img">
                        <img src="<?php echo $user->photoURL; ?>" width="50" /> 
                     </div>
                     <div class="mt-comment-body">
                        <div class="mt-comment-info">
                           <span class="mt-comment-author">
                           <?php if ($user->displayName == true) {
                           echo $user->displayName;}
                           else {echo "Unknown User";}?></span>
                           <span class="mt-comment-date"><?php echo date('d F, g:i a',$user->last_logged); ?></span>
                        </div>
                        <div class="mt-comment-text">User <?php echo $user->displayName;?> with mac address: 
                        <?php if($user->mac == true){echo $user->mac;}else {echo "Unknown mac";} ?>, recently login to your Wi-Fi network via <?php if ($user->provider == true){ echo $user->provider;} else {echo "Unknown Platform";} ?>  on <?php echo date('d F, g:i a',$user->last_updated);?>.</div>
                        <div class="mt-comment-details">
                           <ul class="mt-comment-actions">
                              <li>
                                 <a href="<?php echo base_url("admin/guest_list")?>">User Details</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <?php } ?> 
                  <?php }else {?>
                     <div class="mt-comment">
                        <div class="mt-comment-body">
                           <p>This table contains no data. </p>
                        </div>
                     </div>
                  <?php }?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="portlet light bordered">
         <div class="portlet-title tabbable-line">
            <div class="caption">
               <i class=" icon-social-twitter font-dark hide"></i>
               <span class="caption-subject font-dark bold uppercase">TOP USAGE USER</span>
            </div>
         </div>
         <div class="portlet-body">
            <div class="row number-stats margin-bottom-30">
               <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="stat-left">
                     <div class="stat-number">
                        <div class="title" > AVG. USAGE DURATION (30 Days)
                        </div>
                        <div class="number" style="color: #e26a6a">
                           <?php 
                              $i = 0;
                              $arr1= array();
                              foreach ($monthly_duration as $key) {
                                 $arr1[$i]= $key->end_time - $key->start_time;
                                 $i++;
                              }
                              $average = array_sum($arr1) / count($arr1);
                              $average = gmdate("H:i", $average);
                              //$dashboard['duration'] = $average;
                              list($hour, $min) = explode(':', $average);
                              echo "{$hour}hr {$min}mins"; // 30mins 13s ?><i class=" number fa fa-clock-o stat-right" style="color: #94a0b2"></i> 
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="stat-right">
                     <div class="stat-number">
                        <div class="title"> TOTAL USAGE DURATION (30Days) </div>

                        <div class="number" style="color: #4b77be"> <?php 
                           $i = 0;
                           $arr1= array();
                           foreach ($monthly_duration as $key) {
                              $arr1[$i]= $key->end_time - $key->start_time;
                              $i++;
                           }
                           $average = array_sum($arr1);
                           $average = gmdate("H:i", $average);
                           //$dashboard['duration'] = $average;
                           list($hour, $min) = explode(':', $average);
                           echo "{$hour}hr {$min}mins "; // 30mins 13s ?><i class=" number fa fa-clock-o stat-left" style="color: ##94a0b2"></i> </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane active" id="tab_actions_pending">
               <!-- BEGIN: Actions -->
               <div class="mt-actions">
               <?php if ($usage_user == true) {?>
                  <?php foreach ($usage_user as $user) {?>
                  <div class="mt-action">
                     <div class="mt-action-img">
                        <img src="<?php echo $user->photoURL; ?>" width='50' /> 
                     </div>
                     <div class="mt-action-body">
                        <div class="mt-action-row">
                           <div class="mt-action-info ">
                              <div class="mt-action-icon">
                                 <?php if($user->provider == 'Facebook') {?>
                                 <i class="fa fa-facebook" style="color: #3b5998"></i> 
                                 <?php }elseif ($user->provider == 'Twitter') {?>
                                 <i class="fa fa-twitter" style="color: #00aced"></i>
                                 <?php }elseif ($user->provider == 'Instagram') {?>
                                 <i class="fa fa-instagram" style="color: #bc2a8d"></i>
                                 <?php }elseif ($user->provider == 'Wechat') {?>
                                 <i class="fa fa-wechat" style="color: #7bb32e"></i>
                                 <?php }elseif ($user->provider == 'Email') {?>
                                 <i class="fa fa-mail" style="color: #dd4b39"></i>
                                 <?php }?>
                              </div>
                              <div class="mt-action-details ">
                                 <span class="mt-action-author">
                                 <?php if($user->displayName == true){ echo $user->displayName;}
                                       else{echo "Unknown User";}?></span>
                                 <p class="mt-action-desc">User mac: 
                                 <?php if($user->mac == true) {echo $user->mac;}
                                       else{echo "Unknown mac";}?></p>
                              </div>
                           </div>
                           <div class="mt-action-datetime ">
                              <span class="mt-action-date">Total Usage: </span>
                              <span class="mt=action-time">
                              <?php $sec = intval($user->duration % 60);
                                    $sec = round($sec /60);
                                    echo "{$min}mins "; ?>
                                 </span>
                           </div>
                           <div class="mt-action-buttons ">
                              <div class="btn-group btn-group-circle">
                                 <a href="<?php echo base_url("admin/guest_list")?>">User Details</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?> 
                  <?php }else {?>
                  <div class="mt-action">
                     <div class="mt-action-body">
                        <p>This table contains no data. </p>
                     </div>
                  </div>
                  <?php }?>
               </div>
               <!-- END: Actions -->
            </div>
         </div>
      </div>
   </div>
</div>
</div>






