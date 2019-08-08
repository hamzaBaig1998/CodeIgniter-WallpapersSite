
<?=validation_errors();?>


<?=form_open_multipart(base_url().'Admins/insertWallpaper')?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" placeholder="Enter Name of wallpaper" class="form-control" name="name" id="name">
    </div>
    <!-- <div class="form-group">
        <label for="category">Category</label>
        <input type="text" placeholder="Enter Name of Category" class="form-control" name="category" id="category">
    </div> -->

    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category" id="category">
            <option>Photography</option>
            <option>Anime</option>
            <option>Quotes</option>
            <option>Abstract</option>
            <option>Celebrity</option>
            <option>Sports</option>
            <option>Graphics</option>
            <option>Nature</option>
            <option>Movie</option>
            <option>Color</option>
            <option>Vehicles</option>
            <option>Games</option>
            <option>Space</option>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="device">Enter Device</label>
        <input type="text" placeholder="Enter Name of device" class="form-control" name="device" id="device">
    </div> -->

    <div class="form-group">
        <label for="device">Device</label>
        <select class="form-control" name="device" id="device">
            <option>Desktop</option>
            <option>Phone</option>
            <option>Tab</option>
        </select>
    </div>

    <div class="form-group">
        <label>Upload File</label>
        <input type="file" name="userfile" size="20">
    </div>
    <button type="submit" class="btn btn-block btn-primary">Add</button>

</form>