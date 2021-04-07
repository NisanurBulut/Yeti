<?php use app\core\Application;?>
<div class="ui middle aligned center aligned grid loginGrid">
  <div class="column loginColumn">
    <img src="<?php echo APP_URL . 'public/images/yeti.jpg'; ?>" class="ui image small middle aligned">
    <form action="/auth/storeLogin" method="post" class="ui large form">
      <div class="ui stacked secondary  segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="ui fluid large violet submit button">Oturum Açın</button>
      </div>

    </form>
    <?php if(Application::$app->session->getFlash('message')): ?>
    <div class="ui error message">
    <?php  echo Application::$app->session->getFlash('message') ?>
    </div>
    <?php endif; ?>
  </div>
</div>