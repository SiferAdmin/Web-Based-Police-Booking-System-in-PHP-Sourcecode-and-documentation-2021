<?php session_start() ?>
<div class="container-fluid">
    <form action="" id="complaint-frm" enctype="multipart/form-data" method="_POST">
        <input type="hidden" name="id" value="">
        <div class="form-group">
            <label for="" class="control-label">Report Title</label>
            <textarea cols="30" rows="1" name="title" required="" class="form-control"></textarea>
        </div>
        <!-- <div class="form-group">
			<label for="" class="control-label">Occurrence Number</label>
			<textarea cols="30" rows="1" name="occurrencenumber" required="" class="form-control"></textarea>
		</div> -->
        <div class="form-group">
            <label for="" class="control-label">Report Description</label>
            <textarea cols="30" rows="3" name="message" required="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Incident Address</label>
            <textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Crime/Complaint Category</label>
            <!-- <textarea cols="30" rows="1" name="typeofcrimecomplaint" required="" class="form-control"></textarea> -->
            <br>
            <select name="typeofcrimecomplaint" required="" class="form-control">
                <option value="Violent Crime">Violent Crime</option>
                <option value="Property Crime">Property Crime</option>
                <option value="White-collar Crime">White-collar Crime</option>
                <option value="Inchoate Crime">Inchoate Crime</option>
                <option value="Personal Crime">Personal Crime</option>
                <option value="Organized Crime">Organized Crime</option>
                <option value="Statutory Crime">Statutory Crime</option>
                <option value="Financial Crime">Financial Crime</option>
                <option value="Traffic Crime">Traffic Crime</option>
                <option value="Drug Crime">Drug Crime</option>
                <option value="Sex Crime">Sex Crime</option>
                <option value="Violent Crime">Violent Crime</option>
                <option value="Other Crime" selected>Other Crime</option>
            </select>
        </div>
        <!-- <div class="form-group">
			<label for="" class="control-label">Suspect Color</label>
			<textarea cols="30" rows="1" name="suspect color" required="" class="form-control"></textarea>
		</div> -->
        <div class="form-group">
            <label for="" class="control-label">Reporter Name</label>
            <textarea cols="30" rows="1" name="reportername" required="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Reporter Contact</label>
            <textarea cols="30" rows="1" name="reportercontact" required="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Evidence</label>
            <input type="file" name="evidence"  class="form-control"/>
            
        </div>
        <button class="button btn btn-primary btn-sm">Submit Booking</button>
        <button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>

    </form>
</div>

<style>
#uni_modal .modal-footer {
    display: none;
}
</style>
<script>
$('#complaint-frm').submit(function(e) {
    e.preventDefault()
    start_load()
    if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
    $.ajax({
        url: 'admin/ajax.php?action=complaint',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
            console.log(err)
            $('#complaint-frm button[type="submit"]').removeAttr('disabled').html('Create');

        },
        success: function(resp) {
            if (resp == 1) {
                location.reload();
                alert_toast("Data successfully saved.", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1000)
            } else {
                end_load()
            }
        }
    })
})
</script>