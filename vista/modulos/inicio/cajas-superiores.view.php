<?php

  $enterprise_id = $_SESSION["enterprise_id"];
  $departments_id = $_SESSION["departments_id"];

  $callsCtrl = new CallsController();

  if($_SESSION['role_id'] != 2) {
    $newCalls = $callsCtrl->newCalls($enterprise_id);
    $callsAttended = $callsCtrl->callsAttended($enterprise_id);
    $notAnswerd = $callsCtrl->notAnsweredCalls($enterprise_id);
    $callsAttending = $callsCtrl->callsAttending($enterprise_id);
    $newCallsPerMonth = $callsCtrl->newCallsPerMonth($enterprise_id);
    $callsAnsweredPerMoth = $callsCtrl->callsAnsweredPerMoth($enterprise_id);
  } else {
    $newCalls = $callsCtrl->newCalls1($enterprise_id,$departments_id);
    $callsAttended = $callsCtrl->callsAttended1($enterprise_id,$departments_id);
    $notAnswerd = $callsCtrl->notAnsweredCalls1($enterprise_id,$departments_id);
    $callsAttending = $callsCtrl->callsAttending1($enterprise_id,$departments_id);
    $newCallsPerMonth = $callsCtrl->newCallsPerMonth1($enterprise_id,$departments_id);
    $newCallsPerMonth = $callsCtrl->callsPerMonth1($enterprise_id,$departments_id);
    $callsAnsweredPerMoth = $callsCtrl->callsAnsweredPerMoth1($enterprise_id,$departments_id);
  }

?>


<!--==============================================
  CAJAS SUPERIORES
===============================================-->

<div class="col-lg-2 col-xs-3">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3><?php echo number_format($newCalls["New Call"]); ?></h3>

      <span><b>Llamadas Nuevas</b></span>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-2 col-xs-3">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo number_format($callsAttended["Calls Attended"]); ?></h3>

      <span><b>Llamadas Atendidas</b></span>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-2 col-xs-3">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3><?php echo number_format($notAnswerd["Not Answered"]); ?></h3>

      <span><b>Llamadas No Contestadas</b></span>
    </div>
  </div>
</div>
  <!-- ./col -->
  <div class="col-lg-2 col-xs-3">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo number_format($callsAttending["Calls Attending"]); ?></h3>

      <span><b>Llamadas en Atenci&oacute:n</b></span>
    </div>
  </div>
</div>
<div class="col-lg-2 col-xs-3">
  <!-- small box -->
  <div class="small-box bg-purple">
    <div class="inner">
      <h3><?php echo number_format($newCallsPerMonth["All"]); ?></h3>

      <span><b>Llamadas Nuevas por Mes</b></span>
    </div>
  </div>
</div>
<div class="col-lg-2 col-xs-3">
  <!-- small box -->
  <div class="small-box bg-black">
    <div class="inner">
      <h3><?php echo number_format($callsAnsweredPerMoth["All"]); ?></h3>

      <span><b>Atendidas por Mes</b></span>
    </div>
  </div>
</div>
<!-- ./col -->