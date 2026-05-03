<div class='d-flex align-items-center justify-content-center'>
<span style='font-size:36px'>路線管理</span>
<button class="add-route btn btn-info mx-3">新增路線</button>
</div>











<script>
$(".add-route").on("click",function(){
    const $btn = $(this);
    $.get("modals/add_route.php",(modal)=>{
        $("#Modal").html(modal)
        $("#RouteModal").modal("show")
        $("#RouteModal").on("hide.bs.modal", function(){
            $btn.focus();
        })
    })
})
</script>