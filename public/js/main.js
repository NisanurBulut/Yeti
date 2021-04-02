$(document).ready(function () {

    $('#editAppForm').find('input').trigger('keyup');

        $("#inputSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#divSearchContent .card").filter(function() {
              console.log(value,$(this).text().toLowerCase());
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });


    $(document).on('click','#confirmCloseBtn',function(){
        $('#confirmModal').modal('hide');
    });

    window.countInput = function (item, labelName) {
        event.preventDefault();
        let labelItem = document.getElementById(labelName);
        let inputContent = $(item).val();
        let s = inputContent.length;
        let maxLength=$(item).attr('maxLength');
        document.getElementById(labelName).innerText=`${s}/${maxLength}`;
        return false;
    };
    function loadModal(href, modalId) {
        event.preventDefault();
        let itemModal = document.getElementById(`${modalId}`);
        $(itemModal)
            .modal({
                blurring: false,
                observeChanges: true,
                transition: "scale",
                onVisible: function (callback) {
                    callback = $.isFunction(callback)
                        ? callback
                        : function () {};

                    $.get(href, function (responseContent) {
                        $(itemModal).find(".content").html(responseContent);
                    });
                },
            })
            .modal("show");
    }

    $(document).on("click", ".btnModalOpen", function (event) {
        event.preventDefault();
        $("#sharedModal").find(".content").html(""); // clear modal content
        let href = $(this).attr("href");
        loadModal(href, "sharedModal");
    });

    $(document).on("click", ".btnConfirmModalOpen", function (event) {
        event.preventDefault();
        let href = $(this).attr("href");
        $("#confirmDeleteForm").attr("action", href);
        $("#confirmModal").modal("setting", "closable", false).modal("show");
    });
});