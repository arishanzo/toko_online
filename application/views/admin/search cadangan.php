 <?php echo form_open('admin/data_barang/search') ?>
    <div class="input-group ">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search"
            name="keyword" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" name="cari">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>