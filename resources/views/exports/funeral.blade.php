<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Parent / Spouse Name</th>
            <th>Age</th>
            <th>Domicile</th>
            <th>Date of Death</th>
            <th>Date of Burial</th>
            <th>Cause of Death</th>
            <th>CVE or Infant</th>
            <th>Place of Burial</th>
            <th>Minister of Exsequics</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funerals as $funeral)
            <tr>
                <td>{{ $funeral->number }}</td>
                <td>{{ $funeral->name }}</td>
                <td>{{ $funeral->surname }}</td>
                <td>{{ $funeral->parent_spouse_name[0] }}{{ $funeral->parent_spouse_name[1] ?? '' }}</td>
                <td>{{ $funeral->age }}</td>
                <td>{{ $funeral->domicile }}</td>
                <td>{{ $funeral->date_of_death }}</td>
                <td>{{ $funeral->date_of_burial }}</td>
                <td>{{ $funeral->cause_of_death }}</td>
                <td>{{ $funeral->cve_or_infants }}</td>
                <td>{{ $funeral->place_of_burial }}</td>
                <td>{{ $funeral->priest->full_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>