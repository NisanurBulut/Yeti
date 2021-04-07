<div class="ui middle aligned center aligned grid loginGrid">
  <div class="column loginColumn">
    <h2 class="ui image header">
      <div class="content">
        Log-in to your account
      </div>
    </h2>

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
        <button type="submit" class="ui fluid large violet submit button">Login</button>
      </div>

      <div class="ui error message"></div>

    </form>
  </div>
</div>