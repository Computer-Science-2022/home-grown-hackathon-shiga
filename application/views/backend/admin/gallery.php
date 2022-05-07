<style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>



<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Gallery</span>
        <a style="float: right;" style="cursor: pointer;" data-toggle="modal" data-target="#joinCode" id="myBtn"> <button type="button" class="btn btn-secondary aog-btn">
                    Add a photo</button> </a>
        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date added</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $this->db->order_by('id', 'DESC');
                    $gallery = $this->db->get('gallery')->result_array();
                    $i = 1;
                    foreach($gallery as $row):?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo date('Y-m-d', strtotime($row['timestamp']));?></td>
                        <td><?php if($row['status']==1){echo "Active";}elseif($row['status']==0){echo "Inactive";}?></td>
                        <td>
                        <?php if($row['status'] == 0){?>
                        <a href="<?php echo base_url().'admin/gallery/approve/'.$row['id'].'/1';?>"><button
                                class="btn btn-secondary aog-btn-r">Enable?</button></a>

                        <?php }elseif($row['status'] == 1){?><a href="<?php echo base_url().'admin/gallery/approve/'.$row['id'].'/0';?>"><button
                                class="btn btn-secondary aog-btn-r">Disable?</button></a><?php } ?>
                        </td>
                        <td><a href="<?php echo base_url().'admin/gallery/delete/'.$row['id'];?>"
                                class="btn btn-danger text-white aog-btn-r">
                                Delete</a></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>




    
<!-- Join code generator modal  -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" style="float: right; color: red; text-align: right;">&times;</span>
  <span class="page-title" style="border-bottom: solid 1px; padding-bottom: 10px;">Add a new photo to AOG gallery</span><br>
  <div class="white-box">
      <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/gallery/create" enctype="multipart/form-data">
          <div class="row">
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <strong>Title:</strong> <input class="form-control p-0 border-0" name="name" label="title" required type="text" placeholder="Photo title">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <strong>Image:</strong> <input class="form-control p-0 border-0" name="file" label="file" required type="file" placeholder="Photo">
              </div>
          </div><br>
          
          <center><button class="btn btn-primary aog-btn">Submit</button></center>
      </form>

      </div>
</div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
  modal.style.display = "none";
}
}

$('#password').modal('hide');
</script> 


<script>
	const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
    v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

// do the work...
document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
    const table = th.closest('table');
    Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => table.appendChild(tr) );
})));
</script>