<div class="ui modal">
  <div class="header">Header</div>
  <div class="content">
  <form class="ui form" autocomplete="off" method="POST" action="/apps/storeApp">
    <h4 class="ui dividing header">Uygulama bilgileri</h4>
    <div class="field">
        <label>Uygulama Adı</label>
        <div class="ui fluid field">
            <div class="ui right labeled input">
                <input type="text" name="app_name" placeholder="Uygulama Adı" required
                    onkeyup="event.preventDefault();countInput(this,'lblAppName')" maxlength="100"/>
                <div class="ui basic label label" id="lblAppName">0</div>
            </div>
        </div>
    </div>
    <div class="field">
        <label>Uygulama tanımı/açıklama</label>
        <div class="ui fluid field">
            <div class="ui right labeled input">
            <input type="text" name="description" class="inputTextAreaHeight"
            onkeyup="event.preventDefault();countInput(this,'lblAppDescription')"
            placeholder="Uygulama Tanımı/Açıklama" required />
            <div class="ui basic label label text-center" id="lblAppDescription">0</div>
            </div>
        </div>
    </div>
    <div class="field">
        <label>Erişim bilgileri</label>
        <div class="two fields">
            <div class="field">
                <div class="ui right labeled input">
                    <input type="text" name="db_name" placeholder="Veritabanı Adı" required
                    onkeyup="event.preventDefault();countInput(this,'lblAppDbName')" maxlength="100"/>
                    <div class="ui basic label label" id="lblAppDbName">0</div>
                </div>
            </div>
            <div class="field">
                <div class="ui right labeled input">
                    <input type="text" name="access_url" placeholder="Bağlantı Adresi" required
                    onkeyup="event.preventDefault();countInput(this,'lblAppUrlAddress')" maxlength="200"/>
                    <div class="ui basic label label" id="lblAppUrlAddress">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="field">
        <label>Uygulama ikon bilgisi</label>
        <div class="two fields">
            <div class="twelve wide field">
                <div class="ui right labeled input">
                    <input id="url_icon" type="text" name="image_url" placeholder="Uygulama ikon adresi"
                      onchange="$('#icon_img').attr('src',this.value)"
                    onkeyup="event.preventDefault();countInput(this,'lblAppUrlIcon')" maxlength="300"/>
                    <div class="ui basic label label" id="lblAppUrlIcon">0</div>
                </div>
            </div>
            <div class="four wide field">
                <img id="icon_img" class="ui middle aligned tiny image" src="http://placehold.jp/200x150.png" />
            </div>
        </div>
    </div>
    <div class="formBtnRightAlligned">
        <button class="ui button purple" type="submit">Kaydet</button>
    </div>
</form>
</div>
  </div>
</div>