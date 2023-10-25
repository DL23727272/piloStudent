<?php

    require 'dbconnection.php';

    if (isset($_POST['update_student'])) {
        $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $course = mysqli_real_escape_string($con, $_POST['course']);

        if ($name == NULL || $email == NULL || $phone == NULL || $course == NULL) {
            $res = [
                'status' => 422,
                'alertify_message' => 'All fields are mandatory insan!!'
            ];

            echo json_encode($res);
            return;
        }

        $query = "UPDATE dl SET name=?, email=?, phone=?, course=? WHERE id=?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $phone, $course, $student_id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $res = [
                    'status' => 200,
                    'alertify_message' => 'Updated na insan!!!'
                ];
            } 
            else {
                $res = [
                    'status' => 500,
                    'alertify_message' => 'Di na update insan!!!'
                ];
            }

            mysqli_stmt_close($stmt);
        } 
        else {
            $res = [
                'status' => 500,
                'alertify_message' => 'Database error insan!'
            ];
        }

        echo json_encode($res);
    } 
    elseif (isset($_POST['delete_student'])) {
        $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

        $query = "DELETE FROM dl WHERE id=?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $student_id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $res = [
                    'status' => 200,
                    'alertify_message' => 'Deleted na insannn!!!'
                ];
            } 
            else {
                $res = [
                    'status' => 500,
                    'alertify_message' => 'Di na delete insannn!!!'
                ];
            }

            mysqli_stmt_close($stmt);
        } 
        else {
            $res = [
                'status' => 500,
                'alertify_message' => 'Database error insan!'
            ];
        }

        echo json_encode($res);
    } 
    elseif (isset($_POST['save_student'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $course = mysqli_real_escape_string($con, $_POST['course']);

        if ($name == NULL || $email == NULL || $phone == NULL || $course == NULL) {
            $res = [
                'status' => 422,
                'alertify_message' => 'All fields are mandatory insan!!'
            ];

            echo json_encode($res);
            return;
        }

        $query = "INSERT INTO dl (name, email, phone, course) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $course);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $res = [
                    'status' => 200,
                    'alertify_message' => 'Added successfully!!!'
                ];
            } 
            else {
                $res = [
                    'status' => 500,
                    'alertify_message' => 'DI NA CREATE!!!'
                ];
            }

            mysqli_stmt_close($stmt);
        } 
        else {
            $res = [
                'status' => 500,
                'alertify_message' => 'Database error insan!'
            ];
        }

        echo json_encode($res);
    } 
    elseif (isset($_GET['student_id'])) {
        $student_id = mysqli_real_escape_string($con, $_GET['student_id']);
        $query = "SELECT * FROM dl WHERE id=?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $student_id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $name, $email, $phone, $course);
                    mysqli_stmt_fetch($stmt);

                    $student = [
                        'id' => $id,
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'course' => $course
                    ];

                    $res = [
                        'status' => 200,
                        'alertify_message' => 'Student Fetched Successfully by id',
                        'data' => $student
                    ];
                } 
                else {
                    $res = [
                        'status' => 404,
                        'alertify_message' => 'Student Id not Found',
                    ];
                }
            } 
            else {
                $res = [
                    'status' => 500,
                    'alertify_message' => 'Database error insan!'
                ];
            }

            mysqli_stmt_close($stmt);
        } 
        else {
            $res = [
                'status' => 500,
                'alertify_message' => 'Database error insan!'
            ];
        }

        echo json_encode($res);
    } 
    else {
        $res = [
            'status' => 400,
            'alertify_message' => 'Invalid request'
        ];
        echo json_encode($res);
    }
?>
