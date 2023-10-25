<!doctype html>
<html lang="en">
  <head>
    <!---------kopya ka lang insan basta wag ka na mag tanong----------->
    <!-- Required meta DL omsimizetags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Alertify sakit sa ulo by DL -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <title>Validation Form</title>
  </head>
  <body>
    <!-- Add Student modal to insannnnn!!!-->
      <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <form id="saveStudent">
                      <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" class="form-control">
                        </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Student</button>

                      </div>
                </form>
          </div>
        </div>
      </div>

    <!-- Edit Student -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="updateStudent">
                <div class="modal-body">

                  <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                  <input type="hidden" name="student_id" id="student_id">

                  <div class="mb-3">
                      <label for="">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="">Email</label>
                      <input type="text" name="email" id="email" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="">Phone</label><!--DL-->
                      <input type="text" name="phone" id="phone" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="">Course</label>
                      <input type="text" name="course" id="course" class="form-control">
                  </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
          </form>
        </div>
      </div>
    </div>

   <!-- View Student -->
   <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            <div class="mb-3">
                <label for="">Name</label>
                <p id="view_name" class="form-control"></p>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <p id="view_email" class="form-control"></p>
            </div>
            <div class="mb-3">
                <label for="">Phone</label>
                <p id="view_phone" class="form-control"></p>
            </div>
            <div class="mb-3">
                <label for="">Course</label>
                <p id="view_course" class="form-control"></p>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4> CCSIT 205 - Web Systems and Technologies</h4>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                        Add Student
                    </button>
                    <div class="container-fluid d-flex justify-content-start">
                        <div style="width: 500px; height: 300px;">
                            <h1 class="h4 mt-4">Total Students Today:
                          
                            </h1>

                            <!----CHART---->
                            <canvas id="myChart"></canvas>

                        </div>
                    </div>
            </div>
            <div class="card-body">
                <table id ="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Course</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'dbconnection.php';

                        $query = "SELECT * FROM dl";
                        $query_run = mysqli_query($con,$query);

                        if(mysqli_num_rows($query_run)>0){
                          foreach ($query_run as $student) {
                      ?>
                              <tr>
                                <td><?=$student['id']?></td>
                                <td><?=$student['name']?></td>
                                <td><?=$student['email']?></td>
                                <td><?=$student['phone']?></td>
                                <td><?=$student['course']?></td>
                                <td>
                                  <button type="button" value="<?=$student['id']?>" class="viewStudentBtn btn btn-info btn-sm">View</button>
                                  <button type="button" value="<?=$student['id']?>" class="editStudentBtn btn btn-success btn-sm">Edit</button>
                                  <button type="button" value="<?=$student['id']?>" class="deleteStudentBtn btn btn-danger btn-sm">Delete</button>
                                </td>
                              </tr>
                          <?php
                        }
                       }
                    ?>
                    
                  </tbody>
                </table>
            </div>
        </div>
    </div>
                                                            <!-------_____________DL_GAMOSO_____________ ------->
                                              <!-------_____________kopya ka lang insan basta wag ka na mag tanong____________ ------->
   

    <!-- Option 1: Bootstrap Bundle with ALertify -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Save a DATA
        $(document).on('submit', '#saveStudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_student", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    } 
                    else if (res.status == 200) {
                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#saveStudent')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                        alertify.success(res.alertify_message);
                    } 
                    else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            });
        });

        // edit button function which shows the data galing sa db
        $(document).on('click', '.editStudentBtn', function (e) {
            var student_id = $(this).val();
            e.preventDefault(); 
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function (response) {
                    var res = jQuery.parseJSON(response);

                    if (res.status == 404) {
                        alert(res.message);
                    } 
                    else if (res.status == 200) {
                        $('#student_id').val(res.data.id);
                        $('#name').val(res.data.name);
                        $('#email').val(res.data.email);
                        $('#phone').val(res.data.phone);
                        $('#course').val(res.data.course);

                        $('#studentEditModal').modal('show');
                    }
                }
            });
        });

        // update naman is after mo ma update yung data sa form, i susubmit mo na gamit to
        $(document).on('submit', '#updateStudent', function (e) {
            e.preventDefault();

            var student_id = $('#student_id').val();
            var formData = new FormData(this);
            formData.append("update_student", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    } 
                    else if (res.status == 200) {
                        $('#errorMessageUpdate').addClass('d-none');
                        $('#studentEditModal').modal('hide');
                        $('#updateStudent')[0].reset();

                        alertify.success(res.alertify_message);

                        $('#myTable').load(location.href + " #myTable");
                    } 
                    else if (res.status == 500) {
                        alertify.error(res.message);
                    }
                }
            });
        });


        // View to par gege, kopya ka lang insan basta wag ka na mag tanong
        $(document).on('click', '.viewStudentBtn', function (e) {
           
            var student_id =$(this).val();
            // alert(student_id);

          $.ajax({
            type: "GET",
            url: "code.php?student_id=" + student_id,
            success: function (response) {
              var res =jQuery.parseJSON(response);

              if(res.status==404){
                alert(res.message);
              }
              else if(res.status==200){
                
                $('#view_name').text(res.data.name);
                $('#view_email').text(res.data.email);
                $('#view_phone').text(res.data.phone);
                $('#view_course').text(res.data.course);

                $('#studentViewModal').modal('show');
              }
              
            }
          });
        });

        // Delete Student to gagi wag
        $(document).on('click', '.deleteStudentBtn', function (e) {
            var student_id = $(this).val();
            e.preventDefault();

            alertify.confirm("Delete Student", "Sure ka na ba saken insan??",
                function () { 
                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            delete_student: true,
                            student_id: student_id
                        },
                        success: function (response) {
                            var res = jQuery.parseJSON(response);

                            if (res.status == 200) {
                                alertify.success(res.alertify_message);
                                $('#myTable').load(location.href + " #myTable");
                            } 
                            else if (res.status == 500) {
                                alertify.error(res.message);
                            }
                        }
                    });
                },
                function () { 
                    alertify.error("Agbabawi ka yurds");
                });
        });

            alertify.set('notifier', 'position', 'top-right');
            alertify.success("Hello master DL!")


        //  Chart Appointment Function
        function updateChart() {
            $.ajax({
              url: 'chart.php',
              type: 'GET',
              dataType: 'json',
              success: function(data) {
                if (data.student_count) {
                  var studentCount = data.student_count;

                 
                  var ctx = document.getElementById('myChart').getContext('2d');
                  if (window.myChart) {
                    window.myChart.destroy(); 
                  }

                  window.myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                      labels: ['Number of Students'],
                      datasets: [{
                        label: 'Student Count',
                        data: [studentCount],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              },
              error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
              }
            });
        }

          updateChart();

          setInterval(updateChart, 5000);
        
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Total Students Today'],
                datasets: [
                  {
                    label: 'Student Count',
                    data: [chartData.student_count],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                  },
                ],
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true,
                  },
                },
              },
          });

    </script>
  </body>
                                                                           <!-------_____________DL_GAMOSO_____________ ------->
                                                        <!-------_____________kopya ka lang insan basta wag ka na mag tanong____________ ------->
</html>