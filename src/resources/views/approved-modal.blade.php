@php
    //Топовая штука. Модалка которая спрашивает Точно удалить? перед выполнением какой-то ссылки.
@endphp

<div class="modal fade" id="modalApproved" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class=" " id="modalApprovedTitle">??</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <a type="submit" href="" class="btn btn-danger modalApprovedHrefElement">Да</a>
            </div>
        </div>
    </div>
</div>
