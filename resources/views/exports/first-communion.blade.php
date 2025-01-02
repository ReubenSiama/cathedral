<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Date of First Communion</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Address</th>
            <th>Father's Name</th>
            <th>Father's Surname</th>
            <th>Mother's Name</th>
            <th>Mother's Surname</th>
            <th>Minister</th>
            <th>Place</th>
            <th>Date of Birth</th>
            <th>Place of Birth</th>
            <th>Date of Baptism</th>
            <th>Place of Baptism</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        @foreach($firstCommunions as $firstCommunion)
        <tr>
            <td>{{ $firstCommunion->number }}</td>
            <td>
                {{
                    $firstCommunion->date_of_first_communion 
                    ? date('d-m-Y', strtotime($firstCommunion->date_of_first_communion))
                    : ''
                }}
            </td>
            <td>{{ $firstCommunion->name }}</td>
            <td>{{ $firstCommunion->surname }}</td>
            <td>{{ $firstCommunion->address }}</td>
            <td>{{ $firstCommunion->father_name }}</td>
            <td>{{ $firstCommunion->father_surname }}</td>
            <td>{{ $firstCommunion->mother_name }}</td>
            <td>{{ $firstCommunion->mother_surname }}</td>
            <td>{{ $firstCommunion->priest?->full_name }}</td>
            <td>{{ $firstCommunion->parish?->name }}</td>
            <td>
                {{
                    $firstCommunion->date_of_birth
                    ? date('d-m-Y', strtotime($firstCommunion->date_of_birth))
                    : ''
                }}
            </td>
            <td>{{ $firstCommunion->place_of_birth }}</td>
            <td>
                {{
                    $firstCommunion->date_of_baptism
                    ? date('d-m-Y', strtotime($firstCommunion->date_of_baptism))
                    : ''
                }}
            </td>
            <td>{{ $firstCommunion->placeOfBaptism?->name }}</td>
            <td>{{ $firstCommunion->remarks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>