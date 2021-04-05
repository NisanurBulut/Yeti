$('#dtDemand').ready(function () {
  $.ajax({
    url: 'demands/getDemands',
    contentType: 'application/json; charset=utf-8',
    success: function (data) {
      loadDemandsToTable(JSON.parse(data));
    },
  });
});

function loadDemandsToTable(dataSource) {

    var table = $('#dtDemand').DataTable({
        data: dataSource,
        columns: [
                { data: "id"},
                { data: 'title'},
                { data: 'description'},
                { data: 'status'},
                { data: 'state'},
                { data: 'created_at'},
                {
                    data: "id",
                    render: function (data, type) {
                        return (
                            `<a class="btnModalOpen" id='${data}' href="/demands/editDemand/${data}">`
                            +`<i class="blue edit icon"></i></a>`
                            +`<a class="btnConfirmModalOpen" id='${data}' href="/demands/destroyDemand/${data}">`
                            +`<i class="red trash icon"></i></a>`
                        );
                    },
                },
    ]
});
}
