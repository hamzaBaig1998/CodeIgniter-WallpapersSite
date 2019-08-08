<?php
    $category="Photography";
?>
<div class="d-flex flex-wrap mx-3 mb-4">
    <a href="<?=base_url().'wallpapers/filter/Photography'?>" class="category btn btn-primary">Photography</a>
    <a href="<?=base_url().'wallpapers/filter/Anime'?>" class="category btn btn-primary">Anime</a>
    <a href="<?=base_url().'wallpapers/filter/Quotes'?>" class="category btn btn-primary">Quotes</a>
    <a href="<?=base_url().'wallpapers/filter/Abstract'?>" class="category btn btn-primary">Abstract</a>
    <a href="<?=base_url().'wallpapers/filter/Celebrity'?>" class="category btn btn-primary">Celebrities</a>
    <a href="<?=base_url().'wallpapers/filter/Sports'?>" class="category btn btn-primary">Sports</a>
    <a href="<?=base_url().'wallpapers/filter/Graphics'?>" class="category btn btn-primary">Graphics</a>
    <a href="<?=base_url().'wallpapers/filter/Nature'?>" class="category btn btn-primary">Nature</a>
    <a href="<?=base_url().'wallpapers/filter/Movie'?>" class="category btn btn-primary">Movie</a>
    <a href="<?=base_url().'wallpapers/filter/Color'?>" class="category btn btn-primary">Color</a>
    <a href="<?=base_url().'wallpapers/filter/Vehicles'?>" class="category btn btn-primary">Vehicles</a>
    <a href="<?=base_url().'wallpapers/filter/Games'?>" class="category btn btn-primary">Games</a>
    <a href="<?=base_url().'wallpapers/filter/Space'?>" class="category btn btn-primary">Space</a>
</div>



<div class="column-container container">
    <?php foreach($wallpapers as $wallpaper):  ?>
    <div class="box mb-2">
        <div class="card">
            <img src="<?=base_url().'/assets/images/'.$wallpaper['filename']?>" alt="img" class="img-fluid">
            <div class="card-body p-4">
                <div class="name text-lead"><?=$wallpaper['name']?></div>
                <div class="category text-small"><?=$wallpaper['category']?></div>
                <div class="device-type text-small"><?=$wallpaper['device']?></div>
                <!-- Add href to the download script -->
                <div class="downloads mb-3">Download: <?=$wallpaper['downloads']?></div>
                <a class="btn btn-primary custom" href="<?=base_url()?>wallpapers/download/<?=$wallpaper['id']?>">Download</a>
                <a href="<?=base_url()?>wallpapers/like/<?=$wallpaper['id']?>"><i class="far fa-heart"></i></a><small class="small"><?=$wallpaper['likes']?></small>
            </div>
        </div>
    </div> 
    <?php endforeach;?>
</div>
<div class="pagination-box">
    <div class="pagination text-center">
    <?= $this->pagination->create_links();?>
</div>
</div>
<script>
 function ajaxDownload(id){
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
            }
            else{
                //alert(this.statusText);
            }
        };
     console.log("<?=base_url();?>wallpapers/download/"+id);
        xmlhttp.open("GET", "<?=base_url();?>wallpapers/download/"+id, true);
        xmlhttp.send();
 }
    function ajaxLike(id){
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
            }
            else{
                //alert(this.statusText);
            }
        };
     console.log("<?=base_url();?>wallpapers/download/"+id);
        xmlhttp.open("GET", "<?=base_url()?>wallpapers/like/"+id, true);
        xmlhttp.send();
 }
</script>