<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Father Name</th>
            <th>Father Surname</th>
            <th>Mother Name</th>
            <th>Mother Surname</th>
            <th>Domicile</th>
            <th>Place of Confirmation</th>
            <th>Confirmation Date</th>
            <th>Bishop</th>
            <th>Date of Birth</th>
            <th>Place of Birth</th>
            <th>Sponsor 1</th>
            <th>Sponsor 2</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        @foreach($confirmations as $confirmation)
        <tr>
            <td>{{ $confirmation->number }}</td>
            <td>{{ $confirmation->name }}</td>
            <td>{{ $confirmation->surname }}</td>
            <td>{{ $confirmation->father_name }}</td>
            <td>{{ $confirmation->father_surname }}</td>
            <td>{{ $confirmation->mother_name }}</td>
            <td>{{ $confirmation->mother_surname }}</td>
            <td>{{ $confirmation->domicile }}</td>
            <td>{{ $confirmation->parish->name }}</td>
            <td>{{ $confirmation->confirmation_date }}</td>
            <td>{{ $confirmation->bishop->name }}</td>
            <td>{{ $confirmation->date_of_birth }}</td>
            <td>{{ $confirmation->place_of_birth }}</td>
            <td>{{ $confirmation->sponsor_1 }}</td>
            <td>{{ $confirmation->sponsor_2 }}</td>
            <td>{{ $confirmation->remarks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>