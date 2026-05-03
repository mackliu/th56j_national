<div class="modal fade " tabindex="-1" id="StationModal" aria-labelledby="StationModalLabel">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center w-100">新增站點</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group row col-12">
                <label class='col-2' for="">站點名稱</label>
                <input class='col-10' type="text" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" class="my-2 btn btn-success col-12" value='新增'>
                <input type="text" class="my-2 btn btn-secondary col-12" value='上一頁'>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(function(){
    
    $("#StationModal").on("hide.bs.modal show.bs.modal", function(e){
        if(e.type === "hide"){
            document.activeElement.blur();
        }
    });
})
</script>