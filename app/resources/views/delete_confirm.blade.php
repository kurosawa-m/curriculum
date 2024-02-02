<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">

<div class="modal-dialog" role="document">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title" id="confirmationModalLabel">確認</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">

<span aria-hidden="true">&times;</span>

</button>

</div>

<div class="modal-body">

<p>本当に削除しますか？</p>

</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>

<form id="deleteForm" action="" method="POST">

@csrf

@method('DELETE')

<button type="submit" class="btn btn-danger">削除</button>

</form>

</div>

</div>

</div>

</div>