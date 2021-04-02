<div class="ui top attached menu">
  <div class="left menu">
    <div class="ui left aligned category search item">
      <div class="ui transparent icon input">
        <input id="inputSearch" class="prompt" type="text" placeholder="Uygulama ara...">
        <i class="search link icon"></i>
      </div>
      <div class="results">
      </div>
    </div>
  </div>
  <div class="right menu">
    <a class="ui item mini btnModalOpen" href="{{ route('apps.createApp') }}">
      <i class="plus icon large green center aligned"></i>
    </a>
  </div>
</div>
<div class="ui bottom attached segment" id="divSearchContent">
  <div class="ui four column cards grid">
<?php
for($i=0; $i<20; $i++)
{
    echo '<div class="ui fluid card">
    <div class="content">
        <div class="hoverBtns">
            <a class="btnModalOpen" href="/apps/editApp/{{ $app->id }}">
                <i class="right floated edit blue icon"></i>
            </a>
            <a class="btnConfirmModalOpen" href="">
                <i class="right floated trash red icon"></i>
            </a>
        </div>
        <div class="header">
            <div class="left floated author">
                <img class="ui avatar image" src="https://st2.depositphotos.com/2435397/8630/i/950/depositphotos_86302230-stock-photo-cartoon-ape-like-yeti.jpg"> YETİ
            </div>
        </div>
    </div>
    <div class="content" style="overflow: auto;max-height: 100px;min-height:100px;">
        <div class="description">
            <p>AÇIKLAMA</p>
        </div>
    </div>
    <div class="content">
        <div class="ui middle aligned divided list">
            <div class="item">
                <i class="database icon grey large"></i>
                <div class="content">
                    <a class="header"></a>
                </div>
            </div>
            <div class="item">
                <i class="linkify icon large grey"></i>
                <div class="content">
                    <a class="header"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="meta right floated"></div>
    </div>
</div>';
}
?>
  </div>
</div>
