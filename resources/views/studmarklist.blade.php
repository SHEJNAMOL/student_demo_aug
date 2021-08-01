
<div class="card mb-3">
    <!--<img src="https://cdn.pixabay.com/photo/2015/05/19/14/55/educational-773651_960_720.jpg" class="card-img-top" alt="...">-->
    <div class="card-body">
        <h5 class="card-title">Student Mark Details</h5>
    <a class="nav-item nav-link " href="{{url('/student_marks/create')}}">Create</a>

       <!-- <p class="card-text">You can find here all the informatins about students in the system</p>-->
       @if(!empty($studentmarks))
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">STUDENT ID</th>
                <th scope="col">STUDENT NAME</th>
                <th scope="col">MATHS</th>
                <th scope="col">SCIENCE</th>
                <th scope="col">HISTORY</th>
                <th scope="col">TERM</th>
                <th scope="col">TOTAL MARKS</th>
                <th scope="col">CREATED ON</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
            

            @foreach($studentmarks as $studentmark)
                <tr>
                   <td>{{$studentmark->student_id}}</td>
                    <td>{{$studentmark->student_name}}</td>
                    <td>{{$studentmark->maths}}</td>
                    <td>{{$studentmark->science}}</td>
                    <td>{{$studentmark->history}}</td>
                    <td>{{$studentmark->totalmarks}}</td>
                    <td>

                        <a href="{{ url('/update/'.$student->studid) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/destroy/'.$student->studid) }}" class="btn btn-sm btn-warning">Delete</a>

                    </td>
                </tr>
            @endforeach

            

            </tbody>
        </table>
             @else
                <p>No Data</p>
            @endif

    </div>
</div>






