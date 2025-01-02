<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Date of Baptism</th>
            <th>Date of Birth</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Gender</th>
            <th>Father's Name</th>
            <th>Father's Surname</th>
            <th>Mother's Name</th>
            <th>Mother's Surname</th>
            <th>Place of Birth</th>
            <th>Minister</th>
        </tr>
    </thead>
    <tbody>
        @foreach($baptisms as $baptism)
        <tr>
            <td>{{ $baptism->number }}</td>
            <td>{{ $baptism->date_of_baptism ? date('d-m-Y', strtotime($baptism->date_of_baptism)) : '' }}</td>
            <td>{{ $baptism->date_of_birth ? date('d-m-Y', strtotime($baptism->date_of_birth)) : '' }}</td>
            <td>{{ $baptism->name }}</td>
            <td>{{ $baptism->surname }}</td>
            <td>{{ $baptism->gender }}</td>
            <td>{{ $baptism->father_name }}</td>
            <td>{{ $baptism->father_surname }}</td>
            <td>{{ $baptism->mother_name }}</td>
            <td>{{ $baptism->mother_surname }}</td>
            <td>{{ $baptism->place_of_birth }}</td>
            <td>{{ $baptism->priest?->full_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
