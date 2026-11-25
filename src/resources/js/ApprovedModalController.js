ApprovedModalController = {};

/**
 * Ссылка с атрибутом approvedModal="Текст вопроса" показывает модалку подтверждения.
 * approvedModal-descr="..."   — доп. текст.
 * approvedModal-method="POST" — после подтверждения отправить POST-форму с CSRF-токеном
 *                               (для удаления и других изменяющих действий). Также DELETE/PUT/PATCH.
 */
ApprovedModalController.New = function (e) {

    var self = {};

    self.e = e;
    self.url = e.attr('href');
    e.attr('href', "#")
    self.title = e.attr('approvedModal');
    self.descr = e.attr('approvedModal-descr');
    self.method = (e.attr('approvedModal-method') || 'GET').toUpperCase();

    self.Click = function (e) {
        $("#modalApproved").modal('show');
        $("#modalApprovedTitle").text(self.title);
        $("#modalApprovedDescr").text(self.descr);

        var btn = $(".modalApprovedHrefElement");
        btn.off("click.approved");

        if (self.method === 'GET') {
            btn.attr("href", self.url);
            return;
        }

        btn.attr("href", "#");
        btn.on("click.approved", function (ev) {
            ev.preventDefault();
            ApprovedModalController.SubmitForm(self.url, self.method);
        });
    };

    self.e.on("mousedown", self.Click);
    self.e.on("click", function (ev) { ev.preventDefault(); });

    return self;
}

ApprovedModalController.SubmitForm = function (url, method) {
    var token = $('meta[name="csrf-token"]').attr('content') || '';
    var form = $('<form>', {method: 'POST', action: url}).css('display', 'none');
    form.append($('<input>', {type: 'hidden', name: '_token', value: token}));
    if (method !== 'POST') {
        form.append($('<input>', {type: 'hidden', name: '_method', value: method}));
    }
    $('body').append(form);
    form.trigger('submit');
};

ApprovedModalController.Init = function () {

    $('[approvedModal]').each(function( index ) {
        ApprovedModalController.New($( this ));
    });

};


window.ApprovedModalController = ApprovedModalController;
window.ApprovedModalController.Init();
