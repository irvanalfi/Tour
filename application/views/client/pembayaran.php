<form method="POST" action="<?php base_url(); ?>proses_bayar">
    <div class="mb-3">
        <label class="form-label">Nama</label> <br>

        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label class="form-label">Gender</label><br>
        <select class="form-control" name="gender">
            <option value="P">Perempuan</option>
            <option value="L">Laki-Laki</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label> <br>
        <input type="text" class="form-control" name="phone">
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label> <br>
        <input type="text" class="form-control" name="address">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>