$(document).ready(function () {
  showAllCars();

  function showAllCars() {
    $.ajax({
      url: "controllers/action.php",
      type: "POST",
      data: { action: "view" },
      success: function (response) {
        // console.log(response);
        $("#showCar").html(response);
        $("table").DataTable({ order: [0, "desc"] });
      },
    });
  }

  //insert ajax
  $("#insert").click(function (e) {
    if ($("#form-data")[0].checkValidity()) {
      e.preventDefault();
      $.ajax({
        url: "controllers/action.php",
        type: "POST",
        data: $("#form-data").serialize() + "&action=insert",

        success: function (response) {
          console.log("inserted");
          Swal.fire({
            title: "Car Added Successfully",
            type: "Success",
          });

          $("#addModal").modal("hide");
          $("#form-data")[0].reset();
          showAllCars();
        },
      });
    }
  });

  //edit car

  $("body").on("click", ".editBtn", function (e) {
    console.log("works");
    e.preventDefault();
    edit_id = $(this).attr("id");
    $.ajax({
      url: "controllers/action.php",
      type: "POST",
      data: { edit_id: edit_id },
      success: function (response) {
        // console.log(response);

        data = JSON.parse(response);
        $("#id").val(data.id);
        $("#registration").val(data.registration);
        $("#color").val(data.color);
        $("#brand").val(data.brand);
        $("#model").val(data.model);
      },
    });
  });

  //update Car ajax

  $("#update").click(function (e) {
    if ($("#edit-form-data")[0].checkValidity()) {
      e.preventDefault();
      $.ajax({
        url: "controllers/action.php",
        type: "POST",
        data: $("#edit-form-data").serialize() + "&action=update",

        success: function (response) {
          console.log("updated");
          Swal.fire({
            title: "Car Updated Successfully",
            type: "Success",
          });

          $("#editModal").modal("hide");
          $("#edit-form-data")[0].reset();
          showAllCars();
        },
      });
    }
  });

  //delete ajax

  $("body").on("click", ".delBtn", function (e) {
    e.preventDefault();
    var tr = $(this).closest("tr");
    del_id = $(this).attr("id");

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "controllers/action.php",
          type: "POST",
          data: { del_id: del_id },
          success: function (response) {
            console.log(response);

            tr.css("background-color", "#ff6666");

            Swal.fire("Deleted", "Car deleted successfully", "success");

            showAllCars();
          },
        });
      }
    });
  });
});
