<div class="ui grid middle aligned segment" style="height: 100vh; margin: 0;">
  <div class="ui column center aligned">
    <div class="ui inverted red statistic">
      <div class="value"><?php echo $exception->getCode() ?></div>
      <div class="label">Error</div>
    </div>

    <div class="ui message red inverted">
      <div class="header"><?php echo $exception->getMessage() ?></div>

    </div>
  </div>
</div>