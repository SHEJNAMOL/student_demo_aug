<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Student Management System</title>
</head>
<body>
@include("navbar")

<div class="row header-container justify-content-center">
    <div class="header">
        <h1>Student Management System</h1>
    </div>
</div>

@if($layout == 'index')
    <div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-8">
                    @include("studentslist")
                </section>
            </div>
        </div>
    </div>
@elseif($layout == 'create')
    <div class="container-fluid mt-4 " id="create-form">
        <div class="row">
            <section class="col-md-7">
                @include("studentslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                   <!-- <img src="https://marketplace.canva.com/MAB7yqsko0c/1/screen_2x/canva-smart-little-schoolgirl--MAB7yqsko0c.jpg" class="card-img-top" alt="...">
                   <img src="https://marketplace.canva.com/MAB7yqsko0c/1/screen_2x/canva-smart-little-schoolgirl--MAB7yqsko0c.jpg" class="card-img-top" alt="...">-->
                   
                   <div class="card-body">
                        <h5 class="card-title">Enter the informations of the new student</h5>
                        <form action="{{ url('/create') }}" method="post">
                            @csrf
                          <!-- <div class="form-group">
                                <label>STUD ID</label>
                                <input name="studid" type="text" class="form-control">
                            </div>-->
                            <div class="form-group">
                                <label>Student Name</label>
                                <input name="student_name" type="text" class="form-control"  placeholder="Enter the first name">
                            </div>
                            
                            <div class="form-group">
                                <label>Gender</label>
                                <input name="gender" id="gender" type="radio" value="M"><label>Male</label>
                                <input name="gender" id="gender" type="radio" value="F"><label>Female</label>
                                
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input name="age" type="text" class="form-control"  placeholder="Enter age">
                            </div>

                            
                            <div class="form-group">
                            <label>Select Class Teacher</label>
                            <!-- Teacher Dropdown -->
                            <select id='teacher_id' name='teacher_id' class="form-control">
                            <option value='0'>-- Select teacher --</option>
                            <!-- Read Teaches -->
                             @foreach($teachers as $teacher)
                            <option value='{{ $teacher->teacher_id }}'>{{ $teacher->teacher_name}}</option>
                            @endforeach
                            </select>
                            </div>

                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">

                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@elseif($layout == 'show')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("studentslist")
            </section>
            <section class="col"></section>
        </div>
    </div>
@elseif($layout == 'edit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("studentslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                 <!--   <img src="https://marketplace.canva.com/MAB7yqsko0c/1/screen_2x/canva-smart-little-schoolgirl--MAB7yqsko0c.jpg" class="card-img-top" alt="...">
                    <img src="https://www.freepik.com/free-photo/smiling-schoolgirl-holding-books-looking_6511909.htm#page=1&query=Education&position=34" class="card-img-top" alt="...">-->
                    

                    <div class="card-body">
                        <h5 class="card-title">Update informations of student</h5>
                        <form action="{{ url('/update')}}" method="post">
                            @csrf
                            
                                <input value="{{$student->student_id}}" name="student_id" id="student_id" type="hidden" class="form-control">
                            
                            <div class="form-group">
                                <label>Stud Name</label>
                                <input value="{{$student->student_name}}" name="student_name" type="text" class="form-control"  placeholder="Enter the first name">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input value="{{$student->gender}}" name="gender" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input value="{{$student->age}}" name="age" type="text" class="form-control"  placeholder="Enter the Age">
                            </div>
                            

                            <div class="form-group">
                            <label>Select Class Teacher</label>
                            <!-- Teacher Dropdown -->
                            <select id='teacher_id' name='teacher_id' class="form-control">
                            <option value='0'>-- Select teacher --</option>
                            <!-- Read Teaches -->
                             @foreach($teachers as $teacher)
                             @php
                             $selected='';
                             @endphp
                             @if($teacher->class_id==$student->class_id)
                             @php 
                             $selected='selected';
                             @endphp
                             
                            
                             @endif
                            <option value='{{ $teacher->teacher_id }}' selected='{{$selected}}'>{{ $teacher->teacher_name}}</option>
                
                            @endforeach
                            </select>
                            </div>
                            <input type="submit" class="btn btn-info" value="Update">
                            <input type="reset" class="btn btn-warning" value="Reset">

                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endif

<footer></footer>
    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>