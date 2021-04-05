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
  console.log(dataSource);
    var table = $('#dtDemand').DataTable({
        data: dataSource,
        columns: [
                { data: 'title'},
                { data: 'ownerUsername'},
                {
                  data: "status",
                  render: function (data,type,full) {
                      return (
                        `<div class="ui label ${full.color}">
                        <i class="clock icon"></i> ${data}
                      </div>`
                      );
                  },
              },
                { data: 'state'},
                {
                  data: "differenceTime",
                  render: function (data, type) {
                      return (
                        `<div class="ui label">
                        <i class="clock icon"></i> ${data} saat önce
                      </div>`
                      );
                  },
              },
                {
                    data: "id",
                    render: function (data, type) {
                        return (
                          `<a class="btnModalOpen" id='${data}' href="/demands/showDemand/${data}">`
                            +`<i class="green eye icon"></i></a>`
                            +`<a class="btnModalOpen" id='${data}' href="/demands/editDemand/${data}">`
                            +`<i class="blue edit icon"></i></a>`
                            +`<a class="btnConfirmModalOpen" id='${data}' href="/demands/destroyDemand/${data}">`
                            +`<i class="red trash icon"></i></a>`
                        );
                    },
                },
    ]
});
}
