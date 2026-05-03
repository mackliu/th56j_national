<div class='d-flex align-items-center justify-content-center'>
<span style='font-size:36px'>車輛管理</span>
<button class="add-bus btn btn-info mx-3">新增</button>
</div>


<script>
$(".add-bus").on("click",function(){
    const $btn = $(this);
    $.get("modals/add_bus.php",(modal)=>{
        $("#Modal").html(modal)
        $("#BusModal").modal("show")
        $("#BusModal").on("hide.bs.modal", function(){
            $btn.focus();
        })
    })
})
</script>