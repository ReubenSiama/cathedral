<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Date of Death</th>
            <th>Date of Burial</th>
            <th>Parent / Spouse Name</th>
            <th>Age</th>
            <th>Cause of Death</th>
            <th>Domicile</th>
            <th>Place of Burial</th>
            <th>Minister of Exsequics</th>
            <th>CVE or Infant</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funerals as $funeral)
            <tr>
                <td>{{ $funeral->number }}</td>
                <td>{{ $funeral->name }}</td>
                <td>{{ $funeral->surname }}</td>
                <td>{{ $funeral->date_of_death ? date('d-m-Y', strtotime($funeral->date_of_death)) : '' }}</td>
                <td>{{ $funeral->date_of_burial ? date('d-m-Y', strtotime($funeral->date_of_burial)) : '' }}</td>
                <td>
                    {{
                        count($funeral->parent_spouse_name) === 2 && $funeral->parent_spouse_name[0] !== null
                        ? $funeral->parent_spouse_name[0] .' & '. $funeral->parent_spouse_name[1]
                        : $funeral->parent_spouse_name[0]
                    }}
                </td>
                <td>{{ $funeral->age }}</td>
                <td>{{ $funeral->cause_of_death }}</td>
                <td>{{ $funeral->domicile }}</td>
                <td>{{ $funeral->place_of_burial }}</td>
                <td>{{ $funeral->priest?->full_name }}</td>
                <td>{{ $funeral->cve_or_infants }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
