<?php
session_start();
if ($_SESSION['DatabaseRole'] == 'Admin') {
} 
else {
    echo "<script>window.location.href = '../index.php'</script>";
}
include 'Layout/sidebar.php';
include 'Layout/header.php';
include 'Operations/Connection.php';
?>
<?php
$ID = $_GET['Updid'];
$query = "select * from dealers where dealerid = $ID";
$GetData = mysqli_query($con, $query);
$catdata = mysqli_fetch_assoc($GetData); 
?>
<div class="pageMaterial" id="pageMaterial">
<div class="Box">
            <div class="addbutton">
                <h1 onclick="openAddModal()">ADD NEW DEALER</h1>
            </div>
            <div class="categoryTable">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Dealer Id</th>
                      <th scope="col">Dealer Name</th>
                      <th scope="col">Shop Location</th>
                      <th scope="col">Shop Name</th>
                      <th scope="col">City</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $querys = 'select * from dealers';
                    $res = mysqli_query($con, $querys);
                    while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>'; ?>  
                      <th scope="row"><?= $data['dealerid'] ?></th>
                      <td><?= $data['Dealer_name'] ?></td>
                      <td><?= $data['Dealers_Location'] ?></td>
                      <td><?= $data['shop_Name'] ?></td>
                      <td><?= $data['City'] ?></td>
                      <td><?= $data['contact'] ?></td>

                      <td><a href="../Operations/Dealer_Crud.php?Delid=<?= $data['dealerid'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></a>
                      <a href="../Operations/Edit_Dealer.php?Updid=<?= $data['dealerid'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" onclick="openupdatecat()" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a>
                      </td>
                    <?php echo '</tr>';
                    } ?>
                  </tbody>
                </table>
                <div>
            </div>
        </div>
    </div>

    <div class="blurbg" id="bgblur" style="display: ;"></div>

    <div class="AddcategoryModal" id="AddcategoryModal" style="display: ;">
        <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href = 'Dealers.php';" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <form action="Operations/Dealer_Crud.php" method = "post">
            <div class="Addaccount form-group row">
                <h1 class="col-12" style="padding-bottom: 5px; COLOR:#5271ff;">
                    EDIT <span style="color:rgba(31, 31, 31, 0.719);">DEALER<span>
                </h1>
                <label class="col-3">Dealer Id</label>
              <input type="text" style="background-color:darkgrey !important; color: white;" value = "<?= $catdata['dealerid']?>" name="DealerId" class="form-control logininput col-9 mb-2">
              
              <label class="col-3">Dealer Name</label>
              <input type="text" value = "<?= $catdata['Dealer_name']?>" name="DealerName" class="form-control logininput col-9 mb-2">
              
              <label class="col-3">Shop Name</label>
              <input type="text" value = "<?= $catdata['shop_Name']?>" name="shopName" class="form-control logininput col-9 mb-2">
              
              <label class="col-3">Shop Location</label>
              <input type="text" value = "<?= $catdata['Dealers_Location']?>" name="DealerLocation" class="form-control logininput col-9 mb-2">
              
              <label class="col-3">City</label>
              <input type="text" value = "<?= $catdata['City']?>" name="City" class="form-control logininput col-9 mb-2">

              <label class="col-3">Contact</label>
              <input type="text" value = "<?= $catdata['contact']?>" name="Contact" class="form-control logininput col-9 mb-2">

              <button type="submit" name="UpdateDealer" class="btn btn-primary form-control mt-2" style="background-color:#5271ff;">Update</button>
            </div>
        </form>
    </div>

