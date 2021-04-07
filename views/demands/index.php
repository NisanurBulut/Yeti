
<div class="ui top attached menu">
    <div class="right menu">
        <a class="ui item mini btnModalOpen" href="/demands/createDemand">
            <i class="plus icon large green center aligned"></i>
        </a>
    </div>
</div>
<div class="ui bottom attached segment" id="divSearchContent">
    <table id="dtDemand" class="ui celled table center aligned" style="width:100%">
        <thead>
            <tr>
                <th>Uygulama</th>
                <th>Title</th>
                <th>Talebi Açan</th>
                <th>Talebi Üstlenen</th>
                <th>Durum</th>
                <th>Aşama</th>
                <th>Zaman Aşımı</th>
                <th>işlem</th>
            </tr>
        </thead>
    </table>
</div>
<?php
    include(__DIR__ . '/../shared/confirm-modal.php');
    include(__DIR__ . '/../shared/general-modal.php');
    ?>
<script src="<?php echo APP_URL . 'public/js/datatables-load.js'; ?>"></script>