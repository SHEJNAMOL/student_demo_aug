
<div class="card mb-3">
    <!--<img src="https://cdn.pixabay.com/photo/2015/05/19/14/55/educational-773651_960_720.jpg" class="card-img-top" alt="...">-->
    <div class="card-body">
        <h5 class="card-title">List of students</h5>


        <p class="card-text"><a class="nav-item nav-link " href="{{url('/create')}}">Create</a>
        </p>

        
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">STUD ID</th>
                <th scope="col">STUD NAME</th>
                <th scope="col">GENDER</th>
                <th scope="col">AGE</th>
                <th scope="col">CLASS TEACHER</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>

            @if($students)
            @foreach($students as $student)
                <tr>
                   <td>{{$student->student_id}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->teacher}}</td>
                    <td>

                        <a href="{{ url('/edit/'.$student->student_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/destroy/'.$student->student_id) }}" class="btn btn-sm btn-warning">Delete</a>

                    </td>
                </tr>
            @endforeach
            @else
            <tr colspan='6'>No Data</tr>
            @endif
            </tbody>
        </table>
    </div>
</div>






